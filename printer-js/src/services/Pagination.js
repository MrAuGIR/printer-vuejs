
class Pagination {

    constructor() {
        this.width = 210.0
        this.height = 297.0
        this.pages = []
        this.cursor = {x: 0, y: 0}
    }

    makePagination(container, dataProduct){
        this.resetCount()
        let numPage = 1;
        this.pages[numPage] = []
        container.items.forEach(item => {
            if (this.canAddTemplate(dataProduct[item.id])) {
                this.pages[numPage].push(item)
            }else{
                numPage++
                this.resetCount()
                this.pages[numPage] = []
                this.pages[numPage].push(item)
            }
        })
        return this.pages
    }

    canAddTemplate(object) {

        if ((this.cursor.y + object.height) > this.height) {
            this.cursor.x = 0
            this.cursor.y = 0
            return false
        }

        if ((this.cursor.x + object.width) > this.width ) {

            this.cursor.x = 0
            this.cursor.y += object.height + 1

            if ((this.cursor.y + object.height) > this.height) {
                this.cursor.y = 0
                return false
            }
            if ((this.cursor.x + object.width ) > this.width) {
                return false
            }
        }
        this.cursor.x += object.width + 1
        return true
    }

    resetCount() {
        this.cursor.x = 0
        this.cursor.y = 0
    }
}

export default new Pagination()