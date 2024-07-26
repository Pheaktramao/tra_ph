<template>
    <div id="carouselExampleInterval" class="carousel slide pt-22.5" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active " data-bs-interval="100">
          <img src="@/assets/slide1.png" class="d-block w-100 h-100" alt="Slide 1" />
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="@/assets/slide2.png" class="d-block w-100 h-100" alt="Slide 2" />
        </div>
        <div class="carousel-item" data-bs-interval="3000">
          <img src="@/assets/slide3.png" class="d-block w-100 h-100" alt="Slide 3" />
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleInterval"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleInterval"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  <section class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-3xl font-bold mb-10">About Us</h2>
        <p class="mt-4 text-lg leading-6 text-gray-600">
          Officially launched in 2024, Pnher Now Express Philippines is a local courier service provider that is committed to providing express delivery services and international logistics as its core business. Known for its corporate excellence such as its mobile application, VIP platform, free door-to-door pickup, real-time order tracking system, affordable shipping, 24/7 customer service, and 365-day operations, all complemented by its nationwide delivery coverage.
        </p>
      </div>
    </div>
  </section>
  <section id="vaule">
    <div class="max-w-4xl mx-auto py-15">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Mission Card -->
      <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="flex items-center">
          <div class="w-16 h-16 bg-blue-500 text-white rounded-full flex items-center justify-center">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
          </div>
          <div class="ml-4">
            <h2 class="text-2xl font-semibold text-gray-800">Our Mission</h2>
          </div>
        </div>
        <p class="mt-4 text-gray-600">
          Our mission is to provide the best service possible and create value for our customers by offering top-notch solutions.
        </p>
      </div>

      <!-- Vision Card -->
      <div class="bg-white shadow-lg rounded-lg p-6">
        <div class="flex items-center">
          <div class="w-16 h-16 bg-green-500 text-white rounded-full flex items-center justify-center">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4l16 16m0-16L4 20"></path>
            </svg>
          </div>
          <div class="ml-4">
            <h2 class="text-2xl font-semibold text-gray-800">Our Vision</h2>
          </div>
        </div>
        <p class="mt-4 text-gray-600">
          Our vision is to be the leading company in our industry, known for our commitment to quality, innovation, and customer satisfaction.
        </p>
      </div>
    </div>
  </div>
  </section>
   <!-- Services Section -->
    <section id="services" class="py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-10">Our Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="bg-white p-6 shadow-lg transition duration-300 ease-in-out transform hover:scale-105 hover:bg-gray-200">
                    <h3 class="text-2xl font-bold mb-4">Baggage Pickup</h3>
                    <p class="text-gray-700">Schedule a convenient pickup time for your baggage at your location.</p>
                </div>
                <div class="bg-white p-6 shadow-lg transition duration-300 ease-in-out transform hover:scale-105 hover:bg-gray-200">
                    <h3 class="text-2xl font-bold mb-4">Fast Delivery</h3>
                    <p class="text-gray-700">We ensure your baggage is delivered to its destination quickly and safely.</p>
                </div>
                <div class="bg-white p-6 shadow-lg transition duration-300 ease-in-out transform hover:scale-105 hover:bg-gray-200">
                    <h3 class="text-2xl font-bold mb-4">Real-Time Tracking</h3>
                    <p class="text-gray-700">Track your baggage in real-time and get updates on its status.</p>
                </div>
            </div>
        </div>
    </section>
     <!-- Partners Section -->
    <section id="partners" class="py-20 bg-gray-100">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-10">Our Partners</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="bg-white p-6 shadow-lg transition duration-300 ease-in-out transform hover:scale-105 hover:bg-gray-200">
                <img src="@/assets/J&T.jpg" alt="Partner 1" class="h-16 mx-auto mb-4">
                <h3 class="text-2xl font-bold mb-2">J&T</h3>
            </div>
            <div class="bg-white p-6 shadow-lg transition duration-300 ease-in-out transform hover:scale-105 hover:bg-gray-200">
                <img src="@/assets/LUCKY.png" alt="Partner 2" class="h-16 mx-auto mb-4">
                <h3 class="text-2xl font-bold mb-2">LUCKY</h3>
            </div>
            <div class="bg-white p-6 shadow-lg transition duration-300 ease-in-out transform hover:scale-105 hover:bg-gray-200">
                <img src="@/assets/CE.png" alt="Partner 3" class="h-16 mx-auto mb-4">
                <h3 class="text-2xl font-bold mb-2">CE</h3>
            </div>
            <div class="bg-white p-6 shadow-lg transition duration-300 ease-in-out transform hover:scale-105 hover:bg-gray-200">
                <img src="@/assets/CX.jpg" alt="Partner 3" class="h-16 mx-auto mb-4">
                <h3 class="text-2xl font-bold mb-2">CAMBIZ</h3>
            </div>
            <div class="bg-white p-6 shadow-lg transition duration-300 ease-in-out transform hover:scale-105 hover:bg-gray-200">
                <img src="@/assets/YADA.jpg" alt="Partner 3" class="h-16 mx-auto mb-4">
                <h3 class="text-2xl font-bold mb-2">YADA</h3>
            </div>
            <div class="bg-white p-6 shadow-lg transition duration-300 ease-in-out transform hover:scale-105 hover:bg-gray-200">
                <img src="@/assets/VET.jpg" alt="Partner 3" class="h-16 mx-auto mb-4">
                <h3 class="text-2xl font-bold mb-2">Vireak Buntham</h3>
            </div>
        </div>
    </div>
</section>



</template>

<script>
export default {
  name: 'HeaderHome'
}
</script>

<style scoped>

</style>
