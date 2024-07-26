<template>
  <UserLayout></UserLayout>
  <div class="container mt-4 p-4">
    <div class="row justify-content-between align-items-center mb-4">
      <div class="col-auto">
        <h3 class="fw-bolder text-dark">List of User Product</h3>
      </div>
      <div class="col-auto">
        <div class="col-auto">
          <div class="input-group search-group mr-50">
            <span class="input-group-text bg-danger text-white">
              <i class="bi bi-search"></i>
            </span>
            <input type="text" class="form-control" placeholder="Search..." v-model="searchQuery" />
          </div>
        </div>
      </div>
      <div class="col-auto">
        <button class="btn btn-danger me-2" @click="showModal = true">Send Baggage</button>
      </div>
    </div>

    <!-- Displaying Baggage List -->
    <div class="row">
      <div class="col-md-4 mb-3" v-for="item in filteredBaggage" :key="item.id">
        <div class="card">
          <div class="card-body">
            <div class="d-flex gap-1">
              <p class="card-title">Receiver Phone: {{ item.receiver_phone }}</p>
            </div>
            <div class="d-flex gap-1">
              <p class="card-text">Sending Address: {{ item.sending_address }}</p>
            </div>
            <div class="d-flex gap-1">
              <p class="card-text">Receiving Address: {{ item.receiving_address }}</p>
            </div>
            <div class="d-flex gap-1">
              <p class="card-text">Type: {{ item.type }}</p>
            </div>
            <div class="d-flex gap-1">
              <p class="card-text">Weight: {{ item.weight }} Kg</p>
            </div>
            <div class="d-flex gap-1">
              <p class="card-text">Company: {{ item.company }}</p>
            </div>
            <div class="d-flex gap-1">
              <p class="card-text">Total Price: {{ calculateTotalCost(item.weight) }} Real</p>
            </div>
            <div class="pt-2">
              <button class="btn btn-danger" @click="deleteItem(item.id)">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for Adding New Baggage -->
  <div v-if="showModal" class="modal fade show" style="display: block" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content mt-20">
        <div class="modal-header d-flex justify-content-between align-items-center">
          <h5 class="modal-title text-white">Add New Baggage</h5>
          <button
            type="button"
            class="close btn bg-danger"
            @click="showModal = false"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="addItem" class="mb-2">
            <div class="row">
              <!-- Form inputs for adding a new baggage -->
              <div class="col-md-20">
                <div class="form-group">
                  <label for="receiver_phone" class="text-danger">Receiver Phone</label>
                  <input
                    type="text"
                    v-model="formData.receiver_phone"
                    class="form-control"
                    id="receiver_phone"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="sending_address" class="text-danger">Sending Address</label>
                  <input
                    type="text"
                    v-model="formData.sending_address"
                    class="form-control"
                    id="sending_address"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="receiving_address" class="text-danger">Receiving Address</label>
                  <input
                    type="text"
                    v-model="formData.receiving_address"
                    class="form-control"
                    id="receiving_address"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="type" class="text-danger">Type</label>
                  <input
                    type="text"
                    v-model="formData.type"
                    class="form-control"
                    id="type"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="weight" class="text-danger">Weight</label>
                  <input
                    type="number"
                    v-model="formData.weight"
                    class="form-control"
                    id="weight"
                    required
                    @input="updateTotalCost"
                  />
                </div>
                <div class="form-group">
                  <label for="company" class="text-danger">Company</label>
                  <input
                    type="text"
                    v-model="formData.company"
                    class="form-control"
                    id="company"
                    required
                  />
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn bg-white">Booking Now</button>
                <button type="button" class="btn bg-white" @click="showModal = false">
                  Cancel
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted, computed } from 'vue'
import { usePostBaggageStore } from '@/stores/post_baggage-list'
import Button from '@/Components/Button/Button.vue'
import UserLayout from '@/Components/Layouts/UserLayout.vue'

export default {
  components: {
    Button,
    UserLayout
  },
  setup() {
    const store = usePostBaggageStore()
    const showModal = ref(false)
    const baggage = ref([])
    const searchQuery = ref('')
    const formData = {
      receiver_phone: '',
      sending_address: '',
      receiving_address: '',
      type: '',
      weight: '',
      company: '',
      post_id: '',
      delivery_status_id: ''
    }

    const addItem = async () => {
      showModal.value = false
      const newItem = {
        receiver_phone: formData.receiver_phone,
        sending_address: formData.sending_address,
        receiving_address: formData.receiving_address,
        type: formData.type,
        weight: formData.weight,
        company: formData.company,
        post_id: formData.post_id !== '' ? parseInt(formData.post_id) : null,
        delivery_status_id:
          formData.delivery_status_id !== '' ? parseInt(formData.delivery_status_id) : null
      }

      try {
        await store.addPostBaggage(newItem) // Call the addPostBaggage action
        await store.fetchPostBaggage() // Fetch updated baggage list
        // Clear form data
        formData.receiver_phone = ''
        formData.sending_address = ''
        formData.receiving_address = ''
        formData.type = ''
        formData.weight = ''
        formData.company = ''
        formData.post_id = ''
        formData.delivery_status_id = ''
      } catch (error) {
        console.error('Error adding new baggage item:', error)
        // Handle error as needed
      }
      location.reload()
    }

    const deleteItem = async (itemId) => {
      try {
        await store.deletePostBaggage(itemId)
        await store.fetchPostBaggage()
        baggage.value = store.post_baggage
      } catch (error) {
        console.error('Error deleting baggage item:', error)
        // Handle error as needed
      }
      location.reload()
    }

    const filteredBaggage = computed(() => {
      return baggage.value.filter((item) =>
        item.receiver_phone.toLowerCase().includes(searchQuery.value.toLowerCase())
      )
    })

    const calculateTotalCost = (weight) => {
      return weight * 6000
    }

    onMounted(async () => {
      await store.fetchPostBaggage() // Fetch initial baggage list on component mount
      baggage.value = store.post_baggage
    })

    return {
      showModal,
      formData,
      addItem,
      baggage,
      deleteItem,
      searchQuery,
      filteredBaggage,
      calculateTotalCost,
      store // Expose store to access state in template
    }
  }
}
</script>

<style scoped>
.container {
  width: 1300px;
  height: 80vh;
  border-radius: 10px;
}

.card {
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Modal styles */
.modal {
  transition: opacity 0.15s linear;
  width: 100%;
  height: 100%;
  background: #2c2b2bc4;
}

.modal .modal-dialog {
  transform: translate(0, -25%);
  transition: transform 0.15s ease-out;
}

.modal.show .modal-dialog {
  transform: translate(0, 0);
}

.modal-content {
  background: #2a2726;
}
</style>
