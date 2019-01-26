<template>
    <div>
        <table width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Blocked</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users">
                <td> {{user.name}}</td>
                <td> {{user.email}}</td>
                <td> {{user.role[0].description}}</td>
                <td v-if="user.user_role[0].blocked"> Blocked</td>
                <td v-else></td>

                <td>
                    <button  v-on:click="updateUserRole(user.id, user.user_role[0].role_id)">Change role</button>
                    <button  v-on:click="updateUserBlocked(user.id, user.user_role[0].blocked)">Block/unblok</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
    import axios from 'axios';

    export default {
        name: "AdminComponent",

        data() {
            return {
                users: null,
                error: null,
                loading: false,
            };
        },
        created() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.error = this.users = null;
                this.loading = true;
                axios
                    .get('/new/users')
                    .then(response => {
                        this.loading = false;
                        this.users = response.data.data;
                        // console.log(response);
                    }).catch(error => {
                    this.loading = false;
                    this.error = error.response.data.message || error.message;
                });
            },
            updateUserRole: function (id, role) {
            if (role == 1){role = 2}
            else {role = 1}
                axios.post("/new/update", {id:id, role:role, _token: AppSettings.csrfToken })
                    .then(response => {
                        console.log(response.data);
                        this.users = response.data.users;
                    })
            },
            updateUserBlocked: function (id, blocked) {
                if (blocked != 1){blocked = 1}
                else {blocked = 0}
                axios.post("/new/blocked", {id:id, blocked:blocked, _token: AppSettings.csrfToken })
                    .then(response => {
                        console.log(response.data);
                        this.users = response.data.users;
                    })
            },
        },


    }
</script>

<style scoped>

</style>