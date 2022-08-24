
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
            tableOfContent: true,
            optionalPage: [
                {
                    id : 'page-optional-1',
                    style: {
                        'backgroundColor': '#ff0000',
                        'backgroundUrl': "http://www.google.image/toto"
                    }
                }
            ],
            children: [
                {
                    title: 'chapitre 1',
                    key: 'chapitre_1',
                    level: 1,
                    col: 3,
                    row: 2,
                    items: [
                        {
                            id: 1,
                            reference: '00001',
                            name: 'Casque 1',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=1'
                        },
                        {
                            id: 2,
                            reference: '00002',
                            name: 'Casque 2',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=2'
                        },
                        {
                            id: 3,
                            reference: '00003',
                            name: 'casque 3',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=3'
                        },
                        {
                            id: 4,
                            reference: '00004',
                            name: 'casque 4',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=4'
                        },
                        {
                            id: 11,
                            reference: '00011',
                            name: 'Casque 11',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=11'
                        },
                        {
                            id: 12,
                            reference: '00012',
                            name: 'Casque 12',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=12'
                        },
                        {
                            id: 13,
                            reference: '00013',
                            name: 'casque 13',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=13'
                        },
                        {
                            id: 14,
                            reference: '00014',
                            name: 'casque 14',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=14'
                        }
                    ],
                    style: {
                        paddingTop: 10,
                        paddingBottom: 10,
                        paddingLeft: 10,
                        paddingRight: 10,
                    }
                },
                {
                    title: 'chapitre 2',
                    key: 'chapitre_2',
                    level: 1,
                    col: 2,
                    row: 3,
                    style: {
                        paddingTop: 10,
                        paddingBottom: 10,
                        paddingLeft: 10,
                        paddingRight: 10,
                    },
                    items: [
                        {
                            id: 5,
                            reference: '00005',
                            name: 'Casque 5',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=15'
                        },
                        {
                            id: 6,
                            reference: '00006',
                            name: 'Casque 6',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=6'
                        },
                        {
                            id: 7,
                            reference: '00007',
                            name: 'casque 7',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=7'
                        },
                        {
                            id: 8,
                            reference: '00008',
                            name: 'casque 8',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=8'
                        },
                        {
                            id: 15,
                            reference: '00015',
                            name: 'Casque 15',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=21'
                        },
                        {
                            id: 16,
                            reference: '00016',
                            name: 'Casque 6',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=16'
                        },
                        {
                            id: 17,
                            reference: '00017',
                            name: 'casque 17',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=17'
                        },
                        {
                            id: 18,
                            reference: '00018',
                            name: 'casque 18',
                            description: 'Lorem ipsum do',
                            image: 'https://loremflickr.com/320/240/brazil?lock=18'
                        }
                    ]
                }
            ],
            defaultStyle: {
                marginTop: 11,
                marginBottom: 11,
                marginLeft: 11,
                marginRight: 11,
                backgroundColor: '#fff',
                width: 210,
                height: 297
            }
        }
    }

}

export default new Fixtures()