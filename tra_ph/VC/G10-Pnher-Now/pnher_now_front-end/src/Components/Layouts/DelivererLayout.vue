<script setup lang="ts">
// import DelivererNavbar from '@/Components/DelivererNavbar.vue'
// import UserNavbar from '@/Components/UserNavbar.vue'
import DelivererNavbar from "@/Components/DelivererNavbar.vue";

</script>
<template>
  <DelivererNavbar/>
  <div class="md:px-50 h-full">
    <div class="h-full">
      <slot />
    </div>
  </div>
</template>

<script setup lang="ts"></script>
