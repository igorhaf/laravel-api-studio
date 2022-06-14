<template>
    <tree :nodes="nodes" :config="config"></tree>
</template>

<script>
import treeview from "vue3-treeview";
import "vue3-treeview/dist/style.css";

export default {
    components: {
        tree: treeview,
    },
    data() {
        return {
            config: {
                roots: ["id1", "id2"],
            },
            nodes: {
                id1: {
                    text: "text1",
                    children: ["id11", "id12"],
                },
                id11: {
                    text: "text11",
                },
                id12: {
                    text: "text12",
                },
                id2: {
                    text: "text2",
                },
            },
        };
    },
};

</script>
<style>

</style>

