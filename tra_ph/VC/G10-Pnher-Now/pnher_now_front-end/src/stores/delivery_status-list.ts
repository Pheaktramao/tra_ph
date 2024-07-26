import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
import { ref } from 'vue'

export const useDeliveryStatusStore = defineStore('deliveryStatus', {
  state: () => ({
    delivery_status: [] as Array<{ id: number, name: string }>,
  }),
  actions: {
    async fetchDeliveryStatus() {
      try {
        const response = await axiosInstance.get('/delivery_status_list', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`,
          },
        });
        this.delivery_status = response.data.delivery_status;
      } catch (error) {
        console.error('Error fetching delivery status:', error);
      }
    },
  },
});
