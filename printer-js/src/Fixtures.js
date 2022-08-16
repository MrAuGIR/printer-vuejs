
class Fixtures {

    constructor () {
        this.state = {
            catalog: {}
        };
        this.state.catalog = this.get();
    }

    get () {
        return {
            title: 'catalogue de test',
            level: 0,
            col: 2,
            row: 3,
            cover: true,
            template: [
                {
                    class: 'Product',
                    template: 'product14page'
                }
            ],
            children: [
                {
                    title: 'chapitre 1',
                    key: 'chapitre_1',
                    level: 1,
                    col: 3,
                    row: 2,
                    paddingTop: 10,
                    paddingBottom: 10,
                    paddingLeft: 10,
                    paddingRight: 10,
                    items: [
                        {
                            reference: '00001',
                            name: 'Casque 1',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=1'
                        },
                        {
                            reference: '00002',
                            name: 'Casque 2',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=2'
                        },
                        {
                            reference: '00003',
                            name: 'casque 3',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=2'
                        },
                        {
                            reference: '00004',
                            name: 'casque 4',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=2'
                        }
                    ]
                },
                {
                    title: 'chapitre 2',
                    key: 'chapitre_2',
                    level: 1,
                    col: 2,
                    row: 3,
                    paddingTop: 10,
                    paddingBottom: 10,
                    paddingLeft: 10,
                    paddingRight: 10,
                    items: [
                        {
                            reference: '00005',
                            name: 'Casque 5',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=15'
                        },
                        {
                            reference: '00006',
                            name: 'Casque 6',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=6'
                        },
                        {
                            reference: '00007',
                            name: 'casque 7',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=7'
                        },
                        {
                            reference: '00008',
                            name: 'casque 8',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=8'
                        }
                    ]
                }
            ]
        }
    }

}

export default new Fixtures()