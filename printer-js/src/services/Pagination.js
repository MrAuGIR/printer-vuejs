
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
        console.log(this.pages)
        return this.pages
    }

    canAddTemplate(object) {
        if(object.id === 17) {
            console.log(object)
            console.log(this.cursor.x)
            console.log(this.cursor.y)
        }
        if ((this.cursor.y + object.height) > this.height) {
            this.cursor.x = 0
            this.cursor.y = 0
           // console.log('le template est trop haut et ne loge pas')
            return false
        }

        if ((this.cursor.x + object.width) > this.width ) {
            //console.log('le template est trop large on retourne a la ligne')
            this.cursor.x = 0
            this.cursor.y += object.height + 1
            if(object.id === 17) {
                console.log(object)
                console.log(this.cursor.x)
                console.log(this.cursor.y)
            }
            if ((this.cursor.y + object.height) > this.height) {
               // console.log('le template est trop haut après un retour a la ligne - on change de page')
                this.cursor.y = 0
                return false
            }
            if ((this.cursor.x + object.width ) > this.width) {
               // console.log('le template est trop large après un retour a la ligne - on change de page')
                return false
            }
        }
        if(object.id === 17) { console.log('le template est ok pour être mis en place sur la page') }
        this.cursor.x += object.width + 1
        if(object.id === 17) {
            console.log(object)
            console.log(this.cursor.x)
            console.log(this.cursor.y)
        }
        return true
    }

    resetCount() {
        this.cursor.x = 0
        this.cursor.y = 0
    }
}

export default new Pagination()