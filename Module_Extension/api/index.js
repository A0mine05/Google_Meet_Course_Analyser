const fs = require('fs');
const readline = require('readline');
const {google} = require('googleapis');

// If modifying these scopes, delete token.json.
const SCOPES = ['https://www.googleapis.com/auth/admin.reports.audit.readonly'];
// The file token.json stores the user's access and refresh tokens, and is
// created automatically when the authorization flow completes for the first
// time.


const TOKEN_PATH = 'token.json';

// Load client secrets from a local file.
fs.readFile('credentials.json', (err, content) => {
  if (err) return console.error('Error loading client secret file', err);

  // Authorize a client with the loaded credentials, then call the
  // Reports API.
  authorize(JSON.parse(content), listLoginEvents);
});

/**
 * Create an OAuth2 client with the given credentials, and then execute the
 * given callback function.
 *
 * @param {Object} credentials The authorization client credentials.
 * @param {function} callback The callback to call with the authorized client.
 */
function authorize(credentials, callback) {
  const {client_secret, client_id, redirect_uris} = credentials.web;
  const oauth2Client = new google.auth.OAuth2(
      client_id, client_secret, redirect_uris[0]);

  // Check if we have previously stored a token.
  fs.readFile(TOKEN_PATH, (err, token) => {
    if (err) return getNewToken(oauth2Client, callback);
    oauth2Client.credentials = JSON.parse(token);
    callback(oauth2Client);
  });
}

/**
 * Get and store new token after prompting for user authorization, and then
 * execute the given callback with the authorized OAuth2 client.
 *
 * @param {google.auth.OAuth2} oauth2Client The OAuth2 client to get token for.
 * @param {getEventsCallback} callback The callback to call with the authorized
 *     client.
 */
function getNewToken(oauth2Client, callback) {
  const authUrl = oauth2Client.generateAuthUrl({
    access_type: 'offline',
    scope: SCOPES,
  });
  console.log('Authorize this app by visiting this url:', authUrl);
  const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout,
  });
  rl.question('Enter the code from that page here: ', (code) => {
    rl.close();
    oauth2Client.getToken(code, (err, token) => {
      if (err) return console.error('Error retrieving access token', err);
      oauth2Client.credentials = token;
      storeToken(token);
      callback(oauth2Client);
    });
  });
}

/**
 * Store token to disk be used in later program executions.
 *
 * @param {Object} token The token to store to disk.
 */
function storeToken(token) {
  fs.writeFile(TOKEN_PATH, JSON.stringify(token), (err) => {
    if (err) return console.warn(`Token not stored to ${TOKEN_PATH}`, err);
    console.log(`Token stored to ${TOKEN_PATH}`);
  });
}

/**
 * Lists the last 10 login events for the domain.
 *
 * @param {google.auth.OAuth2} auth An authorized OAuth2 client.
 */
function listLoginEvents(auth) {
  const service = google.admin({version: 'reports_v1', auth});
  service.activities.list({
    userKey: 'all',
    applicationName: 'meet',
    eventName : 'call_ended',
    maxResults: 1,
  }, (err, res) => {
    if (err) return console.error('The API returned an error:', err.message);

    const activities = res.data.items;
    //console.log(res.data.items);
     if (activities.length) {
       console.log('Logins:');
       activities.forEach((activity) => {
        
         //console.log(activity.events[0].parameters.length);
         console.log(`${activity.id.time}`)
         activity.events[0].parameters.forEach((param) => {
          console.log(`${param.name}`)
           
        //    switch (param.name)
        //    {
        //      case "conference_id": 
        //       console.log(`ID Conference  -->  ${param.value}`);
        //       break;
        //       case "calendar_event_id" :
        //       console.log(`ID Conference sur Calendar  -->  ${param.value}`);
        //       break;
        //       case "video_send_seconds" :
        //       console.log(`Nombre de partage  -->  ${param.intValue}`);
        //       break;

        //       case "endpoint_id":
        //       console.log(`Point de terminaison  -->  ${param.value}`);
        //       break;

        //       case "duration_seconds":
        //       console.log(`Durée de présence dans le meet du participant  -->  ${param.intValue}`);
        //       break;

        //       case "device_type" :
        //       console.log(`type de terminal  -->  ${param.value}`);
        //       break;

        //       case "identifier":
        //       console.log(`Identificateur du Participant  -->  ${param.value}`);
        //       break;
        //       case "location_region":
        //       console.log(`Ville/Region de connexion  -->  ${param.value}`);
        //       break;
        //      default : break;
        //    }
          
          });

      });

      // const mysql = require('mysql');
      // const connection = mysql.createConnection(
      //   {
      //       host : 'localhost',
      //       user : 'root',
      //       password : '!@mD.A',
      //       database : 'google_meet'
      //   });
      //   connection.connect(function(err) {
      //       if (err) throw err;
      //       console.log("Connecté à la base de données MySQL!");
      //     });

      //       let insert_sceance  = {idSceance: `$conference_id`, nbrePartageEcran: `$video_send_seconds` ,nbreActivationMicro: ,nbreParticipant: ,nbreConnexion: ,nbreDeconnexion : ,nom_matiere: ,nom_classe: ,duree: ,};
      //       let insert_etudiant  = {idEtudiant: , idParticipant: , nomUtilisateur: , motDePasse: , email: , addresse: , localisation: , typeTerminal: `$device_type`,};
      //       let insert_enseignant  = {idAdmin: , nomUtilisateur: , motDePasse: , email: , addresse: , localisation: , typeTerminal: `$device_type`,};
      //       query = connection.query('INSERT INTO user SET ?', insertion, function (error, results, fields) {
      //     if (error)throw error;
          
      //   });
      //   console.log(query.sql);
      //   connection.end();

     } else {
       console.log('No logins found.');
    }
   });
}