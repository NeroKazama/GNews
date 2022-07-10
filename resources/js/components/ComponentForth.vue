<template>
    <div class="container sections mt-5" id="app">
        <div class="col-12" style="top: 20px">
            <div class="col-12 profile-page">
                <div class="w-100 p-2 m-2 form-outline">
                    <label for="name">Game Name:</label>
                    <input class="form-control col-4" type="text" v-model="name" name="name">
                </div>
                <div class="w-100 p-2 m-2 form-outline">
                    <label for="Adescription">Description A:</label>
                    <textarea class="form-control col-8" type="text" v-model="Adescription" name="description-a"></textarea>
                </div>
                <div class="w-100 p-2 m-2 form-outline">
                    <label for="Bdescription">Description B:</label>
                    <textarea class="form-control col-8" type="text" v-model="Bdescription" name="description-a"></textarea>
                </div>
                <div class="w-100 text-center mt-5">
                    <a class="btn btn-dark text-center col-2" @click.prevent="UpdateGame()" href="#">Submit</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default({
        props: ['users', 'games'],

        data() {
            return {
                id: null,
                name: null,
                Adescription: null,
                Bdescription: null,
            }
        },

        created() {
            this.id = this.games._id
            this.name = this.games.name
            this.Adescription = this.games.description_one
            this.Bdescription = this.games.description_two
        },

        methods: {

            UpdateGame() {
                axios.patch('/game/'+this.id, {
                    name: this.name,
                    Adescription: this.Adescription,
                    Bdescription: this.Bdescription
                }).then(function (response) {
                    console.log(response)
                    // alert('News Updated Successfully')
                    // setTimeout(() => {
                    //     location.reload(); 
                    // }, 500)
                }).catch(function (error) {
                    alert('there was a problem') 
                })
            },

        }
    });
       
</script>
