const axios = window.axios;

new Vue({
  el: ".container",
  data: {
    email: "",
    password: ""
  },
  methods: {
    login: function() {
      const data = {
        email: this.email,
        password: this.password
      };
      axios
        .post("../api/login.php", data)
        .then(response => {
          alert(`Welcome, ${response.data.name}!`);
          this.clearFields();
        })
        .catch(err => {
          if (err.response.status === 404) {
            alert("Email or password is wrong");
          }
          this.clearFields();
        });
    },
    clearFields: function() {
      this.email = "";
      this.password = "";
    }
  }
});
