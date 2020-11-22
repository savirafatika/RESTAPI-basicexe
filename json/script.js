// let mhs = {
//    nama: "Diah Indri A",
//    nim: "17.12.0116",
//    email: "diah.20@students.amikom.ac.id"
// }

// console.log(JSON.stringify(mhs))

// let xhr = new XMLHttpRequest()
// xhr.onreadystatechange = function () {
//    if (xhr.readyState == 4 && xhr.status == 200) {
//       let mhs = JSON.parse(this.responseText)
//       console.log(mhs)
//    }
// }
// xhr.open('GET', 'coba.json', true)
// xhr.send()

$.getJSON('coba.json', function (data) {
   console.log(data)
})