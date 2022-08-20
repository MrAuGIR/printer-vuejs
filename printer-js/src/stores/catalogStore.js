import { defineStore } from 'pinia'
import fixtures from "../Fixtures";

export const useCatalogStore = defineStore({
    id: 'catalogStore',
    state: () => ({
        catalog: fixtures.get(),
        dataProduct: [],
        dataPages: [],
    }),
    getters: {
        getCatalog: (state) => {
            return state.catalog
        },
        getAllProducts: (state) => {

            let products = []
            let childrens = state.catalog.children
            childrens.forEach(children => {

                children.items.forEach(item => {
                    products.push(item)
                })

                if (children.children) {
                    let containers = children.children
                    containers.forEach(container => {
                        container.items.forEach(item => {
                            products.push(item)
                        })
                    })
                }
            })
            return products
        },
        getProductContainer(items, container) {
            container.items.forEach(item => {
                items.push(item)
            })
            return items
        }
    },
    actions: {
        setFixtures() {
            this.state.catalog = fixtures.get()
        },
        setDataProduct (object, id) {
            this.state.dataProduct[id].push(object)
        },
        setDataPage ( object, id ) {
            this.state.dataPages[id].push(object)
        }
    }
})
