<template>
    <div>
        <ul class="w-full">
            <li v-for="node in treeviewNodes" :key="node.key">
                <div class="w-full min-h-10 flex items-center border border-stats-300 rounded p-2 hover:bg-teal-50 hover:text-teal-600">
                        <span>titule</span>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    name: 'Treeview',
    props: {
        items:{
            type: Array,
            requires:true
        },
        isChild:{
            type: Boolean,
            default:false
        }
    },
    data(){
        return {
            treeviewNodes: []
        }
    },
    created(){
        this.treeviewNodes = this.mapTreeviewNodes(this.items)
    },
    methods: {
        mapTreeviewNodes(items) {
            return items.map((item) => ({
                ...item,
                isExpanded:false,
                isSelected: false,
                chieldre: item.children? this.mapTreeviewNodes(item.children):null
            }))
        }
    }
}

</script>
<style>

</style>
