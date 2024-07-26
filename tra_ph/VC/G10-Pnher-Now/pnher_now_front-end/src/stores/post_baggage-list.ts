import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';

export const usePostBaggageStore = defineStore('postBaggage', {
  state: () => ({
    post_baggage: [] as Array<{
      id: number,
      type: string,
      weight: number,
      receiver_phone: string,
      sending_address: string,
      company: string,
      receiving_address: string,
      post_id: number,
      delivery_status_id: number
    }>,
  }),
  actions: {
    async fetchPostBaggage() {
      try {
        const response = await axiosInstance.get('/baggage_list', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`,
          },
        });
        this.post_baggage = response.data.baggage;
        
      } catch (error) {
        console.error('Error fetching post baggage:', error);
      }
    },
    async addPostBaggage(newItem: { receiver_phone: string; sending_address: string; receiving_address: string; type: string; weight: string; company: string; post_id: number; delivery_status_id: number; }) {
      try {
        const response = await axiosInstance.post('/baggage_post', newItem, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`,
          },
        });
        this.post_baggage.push(response.data); // Assuming response.data is the newly added item
      } catch (error) {
        console.error('Error adding post baggage:', error);
        throw error; // Throw the error to handle it in the component
      }
    },
    async deletePostBaggage(itemId: number) {
      try {
        await axiosInstance.delete(`/baggage_delete/${itemId}`, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`,
          },
        });
        this.post_baggage = this.post_baggage.filter(item => item.id !== itemId);
      } catch (error) {
        console.error('Error deleting post baggage:', error);
        throw error; // Throw the error to handle it in the component
      }
    },
  },
});
