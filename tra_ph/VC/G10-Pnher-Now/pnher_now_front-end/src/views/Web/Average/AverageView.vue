<template>
    <WebLayout></WebLayout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <title>Card with Icons</title>
    </head>

    <div class="form">
        <div class="col d-flex gap-3">
            <div class="card-body">
                <div class="card-text">
                    <h5><i class="fas fa-truck"></i> 10</h5>
                    <p> On process delivery</p>
                </div>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <h5><i class="fas fa-box"></i> 10</h5>
                    <p> Total delivery</p>
                </div>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <h5><i class="fas fa-comments"></i> 10</h5>
                    <p>Total feedback</p>
                </div>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <h5><i class="fas fa-money-bill"></i> 10</h5>
                    <p> Total money earned</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import WebLayout from '@/Components/Layouts/WebLayout.vue'
export default {
    components: {
        WebLayout
    },
    name: "AverageView",

}
</script>


<style scoped>
.form {
    display: flex;
    margin-left: 5px;
    margin-top: 20px;
}

.card-body {
    background: orange;
    flex-direction: row;
    gap: 10px;
    padding: 10px;
    border-radius: 5px;
    height: 15vh;
    width: 160px;
    margin-left: 20px;

}

.card-text h5 {
    display: flex;
    align-items: center;
    gap: 10px;
}

.card-text p {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 10px;
    color: black;
}

link {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin-right: 20px;
}
</style>

