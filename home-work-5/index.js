const express = require("express");
const bodyParser = require("body-parser");
const handlebars = require("express-handlebars");

const app = express();
app.use(express.static("public"));

// ENGINE SET UP
app.engine("handlebars", handlebars());
app.set("view engine", "handlebars");

// ROUTES
app.get("/", (req, res) => {
  res.render("index");
});

const urlencodedParser = bodyParser.urlencoded({ extended: true });
app.post("/congrats", urlencodedParser, (req, res) => {
  res.render("congrats", { name: req.body.name, surname: req.body.surname });
});

// RUNNING SERVER
app.listen(5000, () => console.log("Listening on port 5000.."));
