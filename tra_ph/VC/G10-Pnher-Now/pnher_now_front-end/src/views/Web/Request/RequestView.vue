<template>
  <WebLayout>
    <div class="form">
      <h3>Reguest for help</h3>
      <form class="request">
        <div class="img">
          <img
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKTBull3qHk5M6LrZDxpTq3P_PMV40hk0Gnw&s"
            alt=""
          />
        </div>
        <div class="help">
          <h5>Help</h5>
          <div class="input">
            <div class="mb-3">
              <label for="InputName" class="form-label">Name</label>
              <input type="name" class="name" id="InputName" aria-describedby="nameHelp" />
            </div>
            <div class="mb-3">
              <label for="InputDescription" class="form-label">Description</label>
              <input type="description" class="des" id="InputDescription" />
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </form>
    </div>
  </WebLayout>
</template>

<script>
import WebLayout from '@/Components/Layouts/WebLayout.vue'

export default {
  components: {
    WebLayout
  },
  name: 'FeedbackView'
}
</script>

<style>
<style scoped>

.form {
  display: flex;
  flex-direction: column;
  margin-top: 10px;
  margin-left: 30px;
  justify-content: center;
  align-items: center;
}

h3 {
  color: black;
}

.request {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  width: 800px;
  height: 70%;
  background: white;
}

img {
  margin: 10px;
  width: 400px;
  height: 100%;
}

.help {
  flex-direction: column;
  height: 60%;
  width: 45%;
  margin-right: 10px;
  border: 1px solid orange;
}

h5 {
  display: flex;
  justify-content: center;
}

.input {
  display: flex;
  flex-direction: column;
  padding: 10px;
}

input {
  display: flex;
  width: 100%;
}

.des {
  height: 15vh;
}

.btn {
  display: flex;
  margin: auto;
  justify-content: center;
  margin-bottom: 10px;
  width: 90px;
  height: 35px;
  color: white;
}
</style>