const mysql = require('mysql');
const connection = mysql.createConnection(
    {
        host : 'localhost',
        user : 'root',
        password : '!@mD.A',
        database : 'google_meet'
    }
);

connection.connect(function(err) {
    if (err) throw err;
    console.log("Connecté à la base de données MySQL!");
  });

    let insertion  = {email: 'killejuliettefall@gmail.com', mdp: 'KilleBest'};
    query = connection.query('INSERT INTO user SET ?', insertion, function (error, results, fields) {
  if (error)throw error;
  
});
console.log(query.sql);
connection.end();
