<template>
<DelivererLayout>
  <div class="delivers m-5">
    <nav class="form-delivers delivers-expand-lg flex-row p-1" v-for="item in baggage" :key="item.id">
      <div class="card" style="width: 70%">
        <div class="card-body row" v-if="!hideCardBody">
          <div class="card-row">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVnkosCvGvXkhEeRBdluicMJgG1wJq7rbBiw&s" />
            <div class="card-text col">
              <p>First Name</p>
              <p>last Name</p>
              <p class="name" id="name">{{ item.sender_name }}</p>
              <p class="items" id="items">{{ item.items }}</p>
              <p class="location" id="location">{{ item.location }}</p>
            </div>
            <div class="btn-group">
              <button type="button" class="btn btn-info" @click="acceptDelivery(item)">Detail</button>
              <button type="button" class="btn btn-warning" @click="toggleCardBody">
                Accept
              </button>
            </div>
          </div>
        </div>
      </div>
      <div v-if="isAlertVisible" class="alert-card">
        <div class="alert-card-body">
          <h5 class="text-red">Detail</h5>
          <p>Phone Receiver: {{ selectedBaggage.receiver_phone }}</p>
          <p>Sending Address: {{ selectedBaggage.sending_address }}</p>
          <p>Receiving Address: {{ selectedBaggage.receiving_address }}</p>
          <p>Baggage Type: {{ selectedBaggage.type }}</p>
          <p>Weight: {{ selectedBaggage.weight }} Kg</p>
          <p>Total Cost: {{ calculateTotalCost(selectedBaggage.weight) }} Real</p> <!-- Ensure calculateTotalCost is called with correct argument -->
          <p>Company: {{ selectedBaggage.company }}</p>
          <button type="button" class="btn btn-outline-secondary" @click="openMap">Open Map</button>
          <button type="button" class="btn btn-outline-danger" @click="closeAlert">
            Close Alert
          </button>
        </div>
      </div>
    </nav>
  </div>
</DelivererLayout>
</template>

<script>
import DelivererLayout from '@/Components/Layouts/DelivererLayout.vue';
import { ref, onMounted } from 'vue'
import { usePostBaggageStore } from '@/stores/post_baggage-list'

export default {
  components: {
    DelivererLayout
  },
  name: 'Deliverer',
  setup() {
    const baggageStore = usePostBaggageStore()
    const baggage = ref([])

    onMounted(async () => {
      await baggageStore.fetchPostBaggage()
      baggage.value = baggageStore.post_baggage
    })

    const calculateTotalCost = (weight) => {
      // Replace with your actual logic to calculate total cost based on weight
      return weight * 6000; // Assuming a rate of 6000 Real per Kg
    }

    return {
      baggage,
      calculateTotalCost
    }
  },
  data() {
    return {
      senderDetail: {
        name: '',
        items: '',
        location: '',
        phone_number: '',
        map: ''
      },
      selectedBaggage: {},
      isAlertVisible: false,
      hideCardBody: false
    }
  },
  computed: {
    senderId() {
      const urlParams = new URLSearchParams(window.location.search)
      return urlParams.get('sender') || Math.floor(Math.random() * 10) + 1
    }
  },
  methods: {
    async fetchSenderDetails() {
      try {
        const response = await fetch(`https://reqres.in/api/users/${this.senderId}`)
        const data = await response.json()
        this.senderDetail = {
          name: data.data.first_name + ' ' + data.data.last_name,
          items: data.data.items || 'Default item details',
          location: data.data.location || 'Default location',
          phone_number: data.data.phone_number || '0987654321',
          map: data.data.map ||
            'https://www.google.com/maps/place/Borey+solar+37D/@11.5516697,104.881452,17z/data=!3m1!4b1!4m6!3m5!1s0x310951f4b03f93d9:0xb1ffdc1cb14a8e74!8m2!3d11.5516645!4d104.8840269!16s%2Fg%2F11fqb0xscv?entry=ttu'
        }
      } catch (error) {
        console.error('Failed to fetch sender details:', error)
      }
    },
    acceptDelivery(item) {
      this.selectedBaggage = item
      this.showAlert()
    },
    showAlert() {
      this.isAlertVisible = true
    },
    toggleCardBody() {
      this.hideCardBody = !this.hideCardBody
    },
    openMap() {
      window.open(this.selectedBaggage.map, '_blank')
    },
    closeAlert() {
      this.isAlertVisible = false
    }
  },
  created() {
    this.fetchSenderDetails()
  }
}
</script>

<style scoped>
.card {
  flex-direction: row;
  display: flex;
}

.card-body {
  display: flex;
  width: 180vh;
}

.card-row {
  display: flex;
  align-items: center;
}

.card-text {
  display: flex;
  flex-direction: row;
  margin-left: 10px;
  gap: 40px;
}

.btn-group {
  display: flex;
  gap: 5px;
}

.form-delivers {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.alert-card {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 20px;
  border: 1px solid #ccc;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  width: 30%;
}

.alert-card-body {
  display: flex;
  flex-direction: column;
  gap: 5px;
  text-align: left;
}

.alert-card h5 {
  margin-bottom: 10px;
}

h5 {
  text-align: center;
  background: grey;
}

img {
  width: 38px;
  height: 35px;
  border-radius: 50%;
}

</style>
