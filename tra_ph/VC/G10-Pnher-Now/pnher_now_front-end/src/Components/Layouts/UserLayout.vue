<script setup lang="ts">
import UserNavbar from '@/Components/UserNavbar.vue'
</script>
<template>
  <UserNavbar />
  <div class="md:px-50 h-full">
    <div class="h-full">
      <slot />
    </div>
  </div>
</template>

<script setup lang="ts"></script>
