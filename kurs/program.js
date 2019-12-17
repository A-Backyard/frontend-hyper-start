var mysql = require('mysql');

console.log('Get connection ...');

var conn = mysql.createConnection({
  database: 'nightgl',
  host: "localhost",
  user: "root",
  password: "1221"
});

conn.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
});
