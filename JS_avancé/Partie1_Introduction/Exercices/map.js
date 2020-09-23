const DataStudents =
    [
        [
            "s1",
            {
                "name": "Alice",
                "mention": "",
                "notes": [11, 12, 18],
                "average" : null,
                "url": "http://lorempixel.com/100/100/cats/1"
            }
        ],
        [
            "s2",
            {
                "name": "Alan",
                "mention": "",
                "notes": [10, 14.5, 11],
                "average" : null,
                "url": "http://lorempixel.com/100/100/cats/2"
            }
        ],
        [
            "s3",
            {
                "name": "Bernard",
                "mention": "",
                "notes": [11, 9, 9],
                "average" : null,
                "url": "http://lorempixel.com/100/100/cats/2"
            }
        ],
        [
        "s4",
        {
            "name": "Naoudi",
            "mention": "",
            "notes": [14.5, 19, 18],
            "average" : null,
            "url": "http://lorempixel.com/100/100/cats/3"
        }
        ],
        [
            "s5",
            {
                "name": "Fenley",
                "mention": "",
                "notes": [9, 7, 11],
                "average" : null,
                "url": "http://lorempixel.com/100/100/cats/4"
            }
        ]
    ];

/// 1)

studentMap = new Map (DataStudents);

const updateStudent = () => {

    for (const [sX, student] of studentMap) {
    
        student.average = (student.notes.reduce( (acc, curr) => acc + curr) / student.notes.length).toFixed(2);

        const mentions = [
            { mention: "TB", notes: [17, 20] },
            { mention: "B", notes: [14, 16.99] },
            { mention: "AB", notes: [12, 13.99] },
            { mention: "P", notes: [10, 11.99] },
        ];
    
        for ({mention, notes} of mentions) {
    
            student.mention = "Pas de mention";
    
            const [min, max] = notes;
    
            if  ( student.average >= min && student.average <= max ) student.mention = mention;
        }
    
    }
    console.log(studentMap);
}

/// 2)

let s6 = 
    {
        "name": "Yuki",
        "mention": "",
        "notes": [9, 7, 11],
        "average" : null,
        "url": "http://lorempixel.com/100/100/cats/5"
    } 

if (studentMap.has(s6) === false) studentMap.set("s6", s6); 

updateStudent();