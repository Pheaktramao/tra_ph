<template>
  <UserLayout></UserLayout>
  <div class="container delivery-list p-5">
    <div class="row d-flex justify-content-between">
      <div class="col-auto">
        <div class="input-group search-group" style="width: 500px">
          <span class="input-group-text bg-danger text-white">
            <i class="bi bi-search"></i>
          </span>
          <input
            type="text"
            class="form-control"
            placeholder="Search here..."
            v-model="searchQuery"
          />
          <button
            class="btn btn-outline-secondary"
            type="button"
            @click="clearSearch"
            :disabled="!searchQuery"
          >
            <i class="bi bi-x-square"></i>
          </button>
        </div>
      </div>
      <div class="col-auto d-flex gap-3" v-for="user in users_image" :key="user.image">
        <div class="col-auto">
          <button class="btn btn-light text-danger">
            <div class="message">
              <i class="bi bi-5-circle-fill"></i>
            </div>
            <i class="bi bi-chat-left"></i>
          </button>
        </div>
        <div class="col-auto">
          <button class="btn btn-light text-danger">
            <div class="notification">
              <i class="bi bi-3-circle-fill"></i>
            </div>
            <i class="bi bi-bell"></i>
          </button>
        </div>
        <div class="icon">
          <img :src="user.image" class="rounded-circle" width="40" height="40" />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="mt-3 mb-3">
          <h2>Past Delivery</h2>
        </div>
        <div class="list-group">
          <div
            class="list-group-item d-flex justify-content-between align-items-center mb-3 border-red"
            v-for="(item, index) in baggage"
            :key="item.id"
          >
            <div class="d-flex align-items-center">
              <div class="icon">
                <img
                  src="https://img.a.transfermarkt.technology/portrait/big/406635-1668524492.jpg?lm=1"
                  class="rounded-circle"
                  width="40"
                  height="40"
                />
              </div>
              <div class="ms-3">
                <div class="route fw-bold">
                  FROM {{ item.sending_address }} TO {{ item.receiving_address }}
                </div>
                <div class="date text-muted">Delivered on {{ item.created_at }}</div>
              </div>
            </div>
            <div class="menu position-relative">
              <button class="btn btn-outline-secondary btn-sm" @click="showDetail(item)">ShowDetail</button>
              <div v-if="openMenuIndex === index" class="dropdown-menu show position-absolute">
                <button class="dropdown-item" @click="editItem(index)">cancel</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-for="item in status" :key="item.id">
      <h1>History Status: {{ item.name }}</h1>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="detailModalLabel">Delivery Detail</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div v-if="selectedItem">
              <p><strong>From:</strong> {{ selectedItem.sending_address }}</p>
              <p><strong>To:</strong> {{ selectedItem.receiving_address }}</p>
              <p><strong>Delivered on:</strong> {{ selectedItem.created_at }}</p>
              <!-- Add more details as necessary -->
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import UserLayout from '@/Components/Layouts/UserLayout.vue'
import { ref, onMounted } from 'vue'
import { useDeliveryStatusStore } from '@/stores/delivery_status-list'
import { usePostBaggageStore } from '@/stores/post_baggage-list'
import { Modal } from 'bootstrap'

const deliveryStore = useDeliveryStatusStore()
const baggageStore = usePostBaggageStore()
const baggage = ref([])
const status = ref([])
const selectedItem = ref(null)
const searchQuery = ref('')
let openMenuIndex = ref(-1)

onMounted(async () => {
  await baggageStore.fetchPostBaggage()
  await deliveryStore.fetchDeliveryStatus()

  baggage.value = baggageStore.post_baggage
  status.value = deliveryStore.delivery_status
  baggage.value = baggage.value.filter((b: any) => b.delivery_status_id == 5)
  console.log(baggage.value, status.value)
})

const showDetail = (item: any) => {
  selectedItem.value = item
  const detailModal = new Modal(document.getElementById('detailModal')!)
  detailModal.show()
}

const clearSearch = () => {
  searchQuery.value = ''
}
</script>

<style scoped>
.delivery-list {
  font-family: Arial, sans-serif;
}

.icon img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  margin-right: 10px;
}

.route {
  font-weight: bold;
}

.date {
  color: gray;
}

.menu .dropdown-menu {
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  min-width: 10rem;
  padding: 0.5rem 0;
  margin: 0.125rem 0 0;
  font-size: 1rem;
  color: #212529;
  text-align: left;
  list-style: none;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(0, 0, 0, 0.15);
  border-radius: 0.25rem;
}

.menu .dropdown-menu.show {
  display: block;
}

.border-red {
  border: 1px solid rgb(164, 158, 158);
  border-radius: 5px;
}

.notification {
  position: fixed;
  top: 120px;
  right: 100px;
}

.message {
  position: fixed;
  top: 120px;
  right: 155px;
}
</style>
