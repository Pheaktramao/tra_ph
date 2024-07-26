<template>
  <UserLayout>
    <div
      class="bg-gradient-to-r container mx-auto flex justify-center items-center h-screen w-full"
    >
      <div
        class="w-full max-w-6xl bg-white shadow-md rounded flex shadow-lg shadow-indigo-500/40 h-5/6"
      >
        <div class="w-full flex flex-row mx-auto px-8 my-10">
          <div class="w-1/2 flex flex-col justify-center items-center">
            <h1 class="text-4xl font-bold text-gray-800">Feedback To Deliverer</h1>
            <form @submit.prevent="onSubmit" class="w-full mt-8">
              <div class="mb-6">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                <input
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  id="title"
                  type="text"
                  v-model="title"
                />
              </div>
              <div class="mb-6">
                <label for="message" class="block text-gray-700 font-bold mb-2">Your message</label>
                <textarea
                  id="message"
                  v-model="message"
                  rows="4"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                ></textarea>
              </div>
              <div class="flex items-center justify-center mt-3">
                <button
                  class="shadow appearance-none border rounded bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                  type="submit"
                  :disabled="isSubmitting"
                >
                  Submit
                </button>
              </div>
            </form>
          </div>
          <div class="w-1/2 hidden md:block">
            <img
              src="https://media.istockphoto.com/id/1324723183/vector/workplace-culture-abstract-concept-vector-illustration.jpg?s=612x612&w=0&k=20&c=tt27M26Y-j-sCyJBYe-BOQ7duqeHFFlYBfENNYpJr-o="
              alt="Feedback Image"
              class="w-full h-full object-cover rounded-r-md"
            />
          </div>
        </div>
      </div>
    </div>
  </UserLayout>
</template>

<script>
import UserLayout from '@/Components/Layouts/UserLayout.vue'
import axiosInstance from '@/plugins/axios';
// import axios from 'axios'

export default {
  components: {
    UserLayout
  },
  props: {
    userId: {
      type: Number,
      required: true
    }
  },
  data() {
    return {
      userId:2,
      title: '',
      message: '',
      isSubmitting: false
    }
  },
  methods: {
    async onSubmit() {
      this.isSubmitting = true
      try {
        // Fetch the last deliverer ID from the backend
        // const delivererResponse = await axios.get('/api/DeliverersAndUser/last')
        // const lastDelivererId = delivererResponse.data.lastDelivererId

        const lastDelivererId = 5

        const response = await axiosInstance.post('http://127.0.0.1:8000/api/feedback_post', {
          user_id: this.userId,
          title: this.title,
          comment: this.message,
          delivererAndUser_id: lastDelivererId
        })
        console.log('Response:', response.data)

        alert('Form submitted successfully!')
        // Optionally, clear the form
        this.title = ''
        this.message = ''
      } catch (error) {
        console.error('There was an error submitting the form:', error)
        alert('There was an error submitting the form. Please try again.')
      } finally {
        this.isSubmitting = false
      }
    }
  }
}
</script>


<style scoped>
/* Add your custom styles here */
</style>
