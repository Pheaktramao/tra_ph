<template>
    <WebLayout></WebLayout>
    <div class="form">
        <h2>Process Deliver</h2>
        <table class="table">
            <thead>
                <tr class="table-warning">
                    <th scope="col">Id</th>
                    <th scope="col">Barcode</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="delivers in deliver" :key="delivers.id">
                    <td>{{ delivers.id }}</td>
                    <td>{{ delivers.barcode }}</td>
                    <td>{{ delivers.name }}</td>
                    <td>{{ delivers.type }}</td>
                    <td><button @click="acceptDelivery(delivers.id)">Accept</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import WebLayout from '@/Components/Layouts/WebLayout.vue';

export default {
    components: {
        WebLayout
    },
    name: 'ProcessDeliverView',
    data() {
        return {
            deliver: [
                {
                    id: 1,
                    name: "cake",
                    barcode: "#1010",
                    type: "snacke",
                },
                {
                    id: 2,
                    name: "fren frice",
                    barcode: "#1011",
                    type: "snacke",
                },
                {
                    id: 3,
                    name: "fruit",
                    barcode: "#1012",
                    type: "snacke",
                },
                {
                    id: 4,
                    name: "pizza",
                    barcode: "#1013",
                    type: "snacke",
                },
                {
                    id: 5,
                    name: "rotee",
                    barcode: "#1014",
                    type: "snacke",
                },
                {
                    id: 6,
                    name: "pizza",
                    barcode: "#1015",
                    type: "snacke",
                }
            ]
        }
    }

}

<<<<<<< HEAD
</script>

<style>
=======
</script >

<style scoped>
>>>>>>> 4cab557f7a661cebbcdd630b313161d4cf08e2fb
.table {
    justify-content: center;
    align-items: center;
    margin: auto;
    margin: 10px;
    margin-left: 250px;
    width: 800px;
}

h2 {
    display: flex;
    margin: auto;
    margin-left: 250px;

}

button {
    display: flex;
    width: 60px;
    height: 30px;
    border-radius: 5px;
    background: turquoise;
}
</style>