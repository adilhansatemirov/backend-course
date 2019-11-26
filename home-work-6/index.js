const express = require('express')
const mysql = require('mysql')

const app = express()
app.use(express.json())

// MYSQL CONFIG
const db = mysql.createConnection({
  host: 'localhost',
  user: 'adilhansatemirov',
  password: 'test1234',
  database: 'backend_course'
})

// CONNECTION
db.connect(err => {
  if (err) throw err
  console.log('Mysql connected')
})

// HEALTHCHECK
app.get('/', (req, res) => {
  res.send('Server runs')
})

app.post('/create', (req, res) => {
  const user = req.body
  const sql = 'INSERT INTO users SET ?'

  db.query(sql, user, (err, result) => {
    if (err) throw err
    console.log('User added', user)
    res.send('User added')
  })
})

app.get('/read', (req, res) => {
  const sql = 'SELECT * FROM users'
  db.query(sql, (err, result) => {
    if (err) throw err
    console.log('Users fetched', result)
    res.send(result)
  })
})

app.post('/update/:id', (req, res) => {
  const user = req.body
  const sql = `UPDATE users SET name='${user.name}', email='${user.email}', password='${user.password}' WHERE id='${req.params.id}'`
  db.query(sql, (err, result) => {
    if (err) throw err
    console.log('User updated', result)
    res.send('User updated')
  })
})

app.delete('/delete/:id', (req, res) => {
  const sql = `DELETE FROM users WHERE id=${req.params.id}`
  db.query(sql, (err, result) => {
    if (err) throw err
    console.log('User deleted', result)
    res.send('User deleted')
  })
})

// RUNNING SERVER
app.listen(5000, () => console.log('Listening on port 5000..'))
