<template>
  <div class="bg-gradient-to-r container mx-auto flex justify-center items-center h-screen w-full">
    <div class="w-full max-w-6xl bg-white shadow-md rounded flex shadow-lg shadow-indigo-500/40 h-5/6">
      <div class="w-full flex flex-row mx-auto px-8 my-10">
        <div class="w-1/2 flex flex-col justify-center items-center">
          <h1 class="text-4xl font-bold text-gray-800">SIGN-IN</h1>
          <form @submit.prevent="onSubmit" class="w-full mt-8">
            <div class="mb-6">
              <label for="email" class="block text-gray-700 font-bold mb-2">
                Email
                <span v-if="emailError" class="text-red-500 text-xs">{{ emailError }}</span>
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="email"
                type="email"
                v-model="email"
              />
            </div>
            <div class="mb-6">
              <label for="password" class="block text-gray-700 font-bold mb-2">
                Password
                <span v-if="passwordError" class="text-red-500 text-xs">{{ passwordError }}</span>
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="password"
                type="password"
                v-model="password"
              />
            </div>
            <div class="flex items-center justify-between mb-6">
              <a href="#" class="text-blue-600 hover:text-blue-800">Forgot Password?</a>
              <button
                class="shadow appearance-none border rounded bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                type="submit"
                :disabled="isSubmitting"
              >
                LOGIN
              </button>
            </div>
            <div class="text-center">
              <span class="text-dark">Don't have an account? </span>
              <a href="/register" class="text-blue-600 hover:text-blue-800">Signup</a>
            </div>
          </form>
        </div>
        <div class="w-1/2 hidden md:block">
          <img
            src="https://static.vecteezy.com/system/resources/previews/023/743/925/non_2x/scooter-with-delivery-man-flat-cartoon-character-fast-courier-restaurant-food-service-mail-delivery-service-a-postal-employee-the-determination-of-geolocation-using-electronic-device-free-png.png"
            alt="Signup Image"
            class="w-full h-full object-cover rounded-r-md"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import axiosInstance from '@/plugins/axios'
import { useField, useForm } from 'vee-validate'
import * as yup from 'yup'
import { useRouter } from 'vue-router'

const router = useRouter()

const formSchema = yup.object({
  email: yup.string().required().email().label('Email address'),
  password: yup.string().required().label('Password')
})

const { handleSubmit, isSubmitting } = useForm({
  initialValues: {
    email: '',
    password: ''
  },
  validationSchema: formSchema
})

const onSubmit = handleSubmit(async (values) => {
  try {
    const { data } = await axiosInstance.post('/login', values)
    localStorage.setItem('access_token', data.access_token)
    if (data.role === 'user') {
      router.push('/user_dashboard')
    } else if (data.role === 'deliverer') {
      router.push('/deliverer_dashboard')
    }
  } catch (error) {
    console.error('Error:', error)
  }
})

const { value: email, errorMessage: emailError } = useField('email')
const { value: password, errorMessage: passwordError } = useField('password')

</script>

<style scoped>
.bg-gradient-to-r {
  background-image: linear-gradient(to right, #4f46e5, #7c3aed, #ec4899);
}
</style>
