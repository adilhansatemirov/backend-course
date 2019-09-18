const axios = window.axios;

new Vue({
  el: ".container",
  data: {
    name: "",
    surname: "",
    email: "",

    userToUpdate: {},
    updateModalOpen: false,
    users: []
  },
  methods: {
    submitCreate: function() {
      const data = {
        name: this.name,
        surname: this.surname,
        email: this.email
      };
      axios.post("../api/create.php", data).then(response => {
        this.clearFields();
        this.users.push(response.data);
      });
    },
    submitUpdate: function() {
      axios.post("../api/update.php", this.userToUpdate).then(response => {
        const updatedUser = response.data;
        this.updateModalOpen = false;

        this.users = this.users.map(user => {
          if (user.id === updatedUser.id) return updatedUser;
          return user;
        });
      });
    },
    deleteUser: function(user) {
      axios.post("../api/delete.php", user).then(response => {
        console.log(response.data);
        let indexToDelete;
        for (let i = 0; i < this.users.length; i++) {
          if (user.id === this.users[i].id) {
            indexToDelete = i;
            break;
          }
        }

        this.users.splice(indexToDelete, 1);
      });
    },
    openUpdateModal: function(user) {
      this.userToUpdate = { ...user };
      this.updateModalOpen = true;
    },
    closeUpdateModal: function(event) {
      if (event.target.className === "modal-background") {
        this.updateModalOpen = false;
      }
    },
    getUsers: function() {
      axios.get("../api/").then(response => {
        this.users = response.data;
      });
    },
    clearFields: function() {
      this.name = "";
      this.surname = "";
      this.email = "";
    }
  },
  created() {
    this.getUsers();
  }
});
