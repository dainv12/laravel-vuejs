<template>
    <div class="header">
        <div v-if="isCheck" class="name">sadge</div>
        <div v-else class="name">qweq</div>
        <button class="btn-change" @click="toggleName()">Press</button>   
    </div>
</template>
<script>

export default {
    name: "example-component",
    components: {},
    data() {
      return {
        name: 'dainv',
        isCheck:false
        }
    },
    watch: {
        
        'name':{
            handler(news) {
                
            },
            deep: true
        },
    },
    mounted: function() {
        
    },
    computed: {
    },
    beforeUpdate() {
    },
    created() {
        
    },
    methods: {
        toggleName() {
            this.isCheck = !this.isCheck;
        }
    },
}
</script>