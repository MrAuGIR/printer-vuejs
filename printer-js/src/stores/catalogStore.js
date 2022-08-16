import { defineStore } from 'pinia'
import fixtures from "../Fixtures";

export const useCatalogStore = defineStore({
    id: 'catalogStore',
    state: () => ({
        catalog: {}
    }),
    getters: {
        getCatalog: (state) => {
            return state.catalog
        }
    },
    actions: {
        setFixtures() {
            this.state.catalog = fixtures.catalog
        }
    }
})
