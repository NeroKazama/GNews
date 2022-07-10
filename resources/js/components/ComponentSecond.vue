
 <template>
    <div class="container sections" id="app">
        <div class="col-12 d-inline-flex mt-5">
            <div :class="{'active-tab' :  tab == 'Users'}" 
            class="profile-tab col-2"
            @click="tab = 'Users'">Users</div>
            <div :class="{'active-tab' :  tab == 'Games'}" 
            class="profile-tab col-2"
            @click="tab = 'Games'">Games</div>
            <div :class="{'active-tab' :  tab == 'AddGame'}" 
            class="profile-tab col-2"
            @click="tab = 'AddGame'">Add Game</div>
        </div>
        <div class="col-12">
            <div class="col-12 profile-page" v-if="tab == 'Users'">
                <ul class="w-100 d-inline-flex table" style="height: 50px;">
                    <li class="col-4">Name #</li>
                    <li class="col-4">Email #</li>
                    <li class="col-2">Role</li>
                    <li class="col-2"></li>
                </ul>
                <template v-for="user in users">
                <ul v-bind:key="user._id" class="w-100 pt-3 d-inline-flex border-top table" style="height: 50px;">
                    <li class="col-4">{{user.name}}</li>
                    <li class="col-4">{{user.email}}</li>
                    <li class="col-2">{{user.roles.role}}</li>
                    <li class="col-2"><a @click.prevent="DeleteUser(user._id)" class="btn" href="">Delete</a></li>
                </ul>
                </template>
            </div>
            <div class="col-12 profile-page" v-if="tab == 'Games'">
                <ul class="w-100 d-inline-flex table" style="height: 50px;">
                    <li class="col-4">Name #</li>
                    <li class="col-4"></li>
                    <li class="col-4"></li>
                </ul>
                <template v-for="item in games">
                <ul v-bind:key="item._id" class="w-100 pt-3 d-inline-flex border-top table" style="height: 50px;">
                    <li class="col-4">{{item.name}}</li>
                    <li class="col-4"><a @click.prevent="UpdateGame(item._id)" class="btn" href="">Edit</a></li>
                    <li class="col-4"><a @click.prevent="DeleteGame(item._id)" class="btn" href="">Delete</a></li>
                </ul>
                </template>
            </div>
            <div class="col-12 profile-page" v-if="tab == 'AddGame'">
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
                <div class="w-100 p-2 m-2 form-outline">
                    <label for="Bdescription">Image:</label>
                    <input type="file" id="image" name="image" class="form-control col-8">
                </div>
                <div class="w-100 text-center mt-5">
                    <a class="btn btn-dark text-center col-2" @click.prevent="AddGame()" href="#">Submit</a>
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
                tab: 'Users',
                name: null,
                Adescription: null,
                Bdescription: null,
            }
        },

        methods: {
            AddGame() {
                var imagefile = document.querySelector('#image');
                let formData = new FormData();
                formData.append('image', imagefile);
                formData.append('name', this.name);
                formData.append('Adescription', this.Adescription);
                formData.append('Bdescription', this.Bdescription);

                axios.post('/game', formData).then(function (response) {
                    console.log(response)
                    alert('News Added Successfully')
                    setTimeout(() => {
                        location.reload(); 
                    }, 500)
                }).catch(function (error) {
                   alert('there was a problem')
                })
            },

            DeleteGame(id) {
                axios.delete('/game/'+id).then(function (response) {
                    alert('News Deleted Successfully')
                    setTimeout(() => {
                        location.reload(); 
                    }, 500)
                }).catch(function (error) {
                   alert('there was a problem') 
                })
            },

            UpdateGame(id) {
                window.location.href = '/game/'+id;
            },

            DeleteUser(id) {
                axios.delete('/user/'+id).then(function (response) {
                    alert('User Deleted Successfully')
                    setTimeout(() => {
                        location.reload(); 
                    }, 500)
                })
                .catch(function (error) {
                   alert('there was a problem')
                })
            }
        }
    });
       
</script>
