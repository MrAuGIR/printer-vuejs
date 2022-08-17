
class Pagination {

    constructor() {
        this.width = 210
        this.height = 297
        this.remaindWidth = 210
        this.remainHeight = 297
        this.pages = []
    }

    canAddTemplate(object) {
        if (object.height > this.remainHeight ) {
            return false
        }
        return object.width <= this.remaindWidth;
    }

    addTemplate(object) {
        if(this.canAddTemplate(object)){
            this.remainHeight = this.remainHeight - object.height
            this.remainWidth = this.remainWidth - object.height
        }
    }

    resetCount() {
        this.remaindWidth = 210
        this.remainHeight = 297
    }
}

export default new Pagination()