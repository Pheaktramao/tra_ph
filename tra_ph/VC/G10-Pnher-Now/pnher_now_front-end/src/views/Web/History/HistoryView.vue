<template>
  <!-- <WebLayout></WebLayout> -->
   <DelivererLayout>
      <div class="main">
        <div class="card-border">
          <div v-for="user in users" :key="user.id" class="card">
            <div class="card-body">
              <img :src="user.avatar" class="card-img-top" :alt="user.name">
              <p class="card-id">{{ user.id }}</p>
              <p class="card-name">{{ user.name }}</p>
              <p class="card-email">{{ user.location }}</p>
              <p class="card-email">{{ user.date }}</p>
              <p class="card-email">{{ user.email }}</p>
              <div class="btn">
                <button type="button" class="btn btn-info" @click="SaveCard(user)">Save</button>
                <button type="button" class="btn btn-danger" @click="DeleteCard(user)">Delete</button>
              </div>
            </div>
          </div>
        </div>
        <table class="table ">
          <thead class="table-warning">
            <h1>Table Detail</h1>
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Date</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users" :key="user.id">
              <td><img :src="user.avatar" class="table-img" :alt="user.name"></td>
              <td>{{ user.id }}</td>
              <td>{{ user.name }}</td>
              <td>{{ user.email }}</td>
              <td>{{ user.date }}</td>
              <td>{{ totalUsers }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      </DelivererLayout>
</template>

<script>
// import WebLayout from '@/Components/Layouts/WebLayout.vue';
import DelivererLayout from '@/Components/Layouts/DelivererLayout.vue'

export default {
  components: {
    // WebLayout,
    DelivererLayout
  },
  name: 'HistoryView',
  data() {
    return {
      users: [
        {
          id: 7,
          name: "sanddollar",
          date: "2024-06-25",
          email: "sanddollar.lawson@reqres.in",
          location: "Street 2004",
          avatar: "https://reqres.in/img/faces/7-image.jpg"
        },
        {
          id: 8,
          name: "chilipepper",
          date: "2024-06-25",
          email: "chilipepper.lawson@reqres.in",
          location: "Street 371",
          avatar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFU7U2h0umyF0P6E_yhTX45sGgPEQAbGaJ4g&s"
        },
        {
          id: 9,
          name: "blueiris",
          date: "2024-06-25",
          email: "blueiris.lawson@reqres.in",
          location: "Street 370",
          avatar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6InNDBUBmPvKrzP3zfnKcQsP0xKD54h9vJA&s"
        },
        {
          id: 10,
          name: "mimosa",
          date: "2024-06-25",
          email: "mimosa.lawson@reqres.in",
          location: "Street 271",
          avatar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRH8L6bMGNGn22GQAYaO0tBwUGWw34yxT4MuiQjcSqn-wyd-wwg1rqchpaj2NEN0ihN2s0&usqp=CAU"
        },
        {
          id: 11,
          name: "turquoise",
          date: "2024-06-25",
          email: "turquoise.lawson@reqres.in",
          location: "Street 270",
          avatar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwSlCWQ7ya9lo_nzm5UN6HMeiLjyUWBID6Nxq0d1hoxLR3Ta17amTCjkvJ-23KVX4Fa-w&usqp=CAU"
        },
        {
          id: 12,
          name: "honeysuckle",
          date: "2024-06-25",
          email: "honeysuckle.lawson@reqres.in",
          location: "Street 4500",
          avatar: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDB6u8kwQqJ93AD1zZ_RY1KA3jItYwagCYTZM0Zkfo1YCtl8gaqTA9U3kb5NYZL6joxOw&usqp=CAU"
        }
      ]
    };
  },
  methods: {
    SaveCard(user) {
      alert(`Saved user: ${user.name}`);
    },
    DeleteCard(user) {
      this.users = this.users.filter(u => u.id !== user.id);
      alert(`Deleted user: ${user.name}`);
    }
  },
  computed: {
    totalUsers() {
      return this.users.length;
    }
  }
};
</script>

<style scoped>

.main {
  display: flex;
  flex-direction: column;
  margin-left: 25vh;
}

.card {
  display: flex;
  margin-bottom: 0.5rem;
  flex-direction: row;
 
}

.card-border {
  display: flex;
  flex-direction: column;
  margin-top: 10px;
  width: 900px;
}

.card-body {
  display: flex;
  flex-direction: row;
  justify-content: space-around;

}

img {
  margin-right: 50px;
  width: 40px;
  height: 40px;
  border-radius: 50%;
}

.btn {
  display: flex;
  justify-content: flex-end;
  gap: 3px;
}

p {
  display: flex;
  justify-content: space-evenly;
  margin-top: 5px;
}

.table {
  width: 80%;
  border-collapse: collapse;
  margin-top: 5px;
  justify-content: center;
  align-items: center;
  justify-content: space-around;
}

.table th,
.table td {
  border: 1px solid #ddd;
  padding: 8px;
}

.table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #f2f2f2;
  color: black;
}

.table-img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
}
</style>



