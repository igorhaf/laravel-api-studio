<template>
    <tree :config="config" :nodes="nodes">
        <template #before-input="props">
            <i class="folder-opened-icon" v-if="checkProp(props.node, 0)" />
            <i class="php-icon" v-else-if="checkProp(props.node, 1)" />
            <i class="css-icon" v-else-if="checkProp(props.node, 2)" />
            <i class="javascript-icon" v-else-if="checkProp(props.node, 3)" />
            <i class="blade-icon" v-else-if="checkProp(props.node, 4)" />
            <i class="others-icon" v-else></i>
        </template>
    </tree>
</template>

<script>
import treeview from "vue3-treeview";
import "vue3-treeview/dist/style.css";

export default {
    components: {
        tree: treeview,
    },
    data: function () {
        return {
            nodes: {
                id1: {
                    text: "folder",
                    children: ["id11", "id12", "id13", "id14","id15"],
                    custom: {
                        prop: 0,
                    },
                },
                id11: {
                    text: "php",
                    custom: {
                        prop: 1,
                    },
                },
                id12: {
                    text: "css",
                    custom: {
                        prop: 2,
                    },
                },
                id13: {
                    text: "javascript",
                    custom: {
                        prop: 3,
                    },
                },

                id14: {
                    text: "blade",
                    custom: {
                        prop: 4,
                    },
                },

                id15: {
                    text: "others",
                    custom: {
                        prop: 5,
                    },
                },
                id16: {
                    text: "others",
                    custom: {
                        prop: 6,
                    },
                },
                id2: {
                    text: "folder",
                    custom: {
                        prop: 0,
                    },
                },
            },
            config: {
                roots: ["id1", "id2"],
            },
        };
    },
    methods: {
        checkProp(n, i) {
            return n.custom && Number.isFinite(n.custom.prop) && n.custom.prop === i;
        },
    },
};
</script>
<style>

</style>

