<template>
    <div class="card mt-4">
        <div class="card-header bg-primary">
            <h5>Menu</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <form >
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" v-model="menu.name" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" v-model="menu.url" id="url" placeholder="Enter url">
            </div>
            <div class="form-group">
                <label for="icon">Icon</label>
                <input type="text" class="form-control" v-model="menu.icon" id="icon" placeholder="Enter icon">
            </div>
            <div class="form-group">
                <label for="parent_id">Parent</label>
                <select class="form-control" v-model="menu.parent_id" id="parent_id">
                    <option value="">Select parent</option>
                    <option v-for="menu in menus" :key="menu.id" :value="menu.id">@{{ menu.name }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="order">Order</label>
                <input type="number" class="form-control" v-model="menu.order" id="order" placeholder="Enter order">
            </div>
            <div class="form-group">
                <label for="active">Active</label>
                <select class="form-control" v-model="menu.active" id="active">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <button type="button" class="btn btn-primary" >Save</button>
        </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card mb-3 -->

</template>

<script>
export default {
    mounted() {
        console.log('Component menu mounted.')
    }
}
</script>

<style>

</style>