<template>
  <!-- <WebLayout></WebLayout> -->
  <DelivererLayout>
    <div class="container">
      <h3>Feedback From Customer</h3>
      <div v-for="user in users" :key="user.id" class="card">
        <div class="card-body">
          <div class="card-text">
            <img :src="user.avatar" alt="User Profile" class="avatar-fluid rounded-circle" />
            <div class="user-info">
              <p class="first_name">{{ user.first_name }}</p>
              <p class="last_name">{{ user.last_name }}</p>
              <div class="star-icon">
                <i class="fas fa-star" v-for="n in 5" :key="n"></i>
              </div>
            </div>
          </div>
          <div class="des">
            <p class="descript">{{ user.descript }}</p>
          </div>
        </div>
      </div>
    </div>
  </DelivererLayout>
</template>

<script>
// import UserLayout from '@/Components/Layouts/UserLayout.vue'
import DelivererLayout from '@/Components/Layouts/DelivererLayout.vue'

import '@fortawesome/fontawesome-free/css/all.css'

export default {
  components: {
    DelivererLayout
  },
  name: 'FeedbackView',
  data() {
    return {
      users: [
        {
          id: 1,
          email: 'michael.lawson@reqres.in',
          first_name: 'Michael',
          last_name: 'Lawson',
          descript:
            'This project involves creating a social media application that integrates with the Facebook API for user authentication and management. The application allows users to register, log in, and log out using their Facebook credentials. Users can view and edit their profiles, upload profile pictures, and manage their friend connections.',
          avatar: 'https://reqres.in/img/faces/7-image.jpg'
        },
        {
          id: 2,
          email: 'lindsay.ferguson@reqres.in',
          first_name: 'Lindsay',
          last_name: 'Ferguson',
          descript:
            'This project involves creating a social media application that integrates with the Facebook API for user authentication and management. The application allows users to register, log in, and log out using their Facebook credentials. Users can view and edit their profiles, upload profile pictures, and manage their friend connections.',
          avatar: 'https://reqres.in/img/faces/8-image.jpg'
        },
        {
          id: 3,
          email: 'tobias.funke@reqres.in',
          first_name: 'Tobias',
          last_name: 'Funke',
          descript:
            'This project involves creating a social media application that integrates with the Facebook API for user authentication and management. The application allows users to register, log in, and log out using their Facebook credentials. Users can view and edit their profiles, upload profile pictures, and manage their friend connections.',
          avatar: 'https://reqres.in/img/faces/9-image.jpg'
        },
        {
          id: 4,
          email: 'byron.fields@reqres.in',
          first_name: 'Byron',
          last_name: 'Fields',
          descript:
            'This project involves creating a social media application that integrates with the Facebook API for user authentication and management. The application allows users to register, log in, and log out using their Facebook credentials. Users can view and edit their profiles, upload profile pictures, and manage their friend connections.',
          avatar: 'https://reqres.in/img/faces/10-image.jpg'
        },
        {
          id: 5,
          email: 'george.edwards@reqres.in',
          first_name: 'George',
          last_name: 'Edwards',
          descript:
            'This project involves creating a social media application that integrates with the Facebook API for user authentication and management. The application allows users to register, log in, and log out using their Facebook credentials. Users can view and edit their profiles, upload profile pictures, and manage their friend connections.',
          avatar: 'https://reqres.in/img/faces/11-image.jpg'
        },
        {
          id: 6,
          email: 'rachel.howell@reqres.in',
          first_name: 'Rachel',
          last_name: 'Howell',
          descript:
            'This project involves creating a social media application that integrates with the Facebook API for user authentication and management. The application allows users to register, log in, and log out using their Facebook credentials. Users can view and edit their profiles, upload profile pictures, and manage their friend connections.',
          avatar: 'https://reqres.in/img/faces/12-image.jpg'
        }
      ]
    }
  }
}
</script>

<<<<<<< HEAD
<style>

=======
<style scoped>
>>>>>>> 4cab557f7a661cebbcdd630b313161d4cf08e2fb

.container {
  display: flex;
  flex-direction: column;
  margin-top: 10px;
  /* margin-left: 50px; */
}

.card {
  display: flex;
  flex-direction: column;
  margin-top: 5px;
  padding: 10px;
  border-radius: 5px;
  width: 100%;
  height: 20vh;
}

.card-body {
  display: flex;
  flex-direction: column;
}

.card-text {
  display: flex;
  flex-direction: row;
}

.user-info {
  display: flex;
  margin-left: 10px;
}

.star-icon {
  display: flex;
  color: gold;
  margin-left: 10px;
}

.avatar-fluid {
  width: 30px;
  height: 30px;
}
</style>
