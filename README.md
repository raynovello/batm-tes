# tes-developer

Terdapat 2 aplikasi yang dibuat dalam tes ini:

1. Aplikasi server : https://www.rayhannovelo.com/demo/batm_server/public/ : Aplikasi server dijadikan sebagai servernya yang berfungsi mengelola data seperti (login, register, CRUD data customer dan Batch Processing) dari aplikasi client
2. Aplikasi client : https://www.rayhannovelo.com/demo/batm_client/public/ : Aplikasi client digunakan untuk client dengan user interface yang user-friendly

* Pengujian menggunakan aplikasi langsung :

1. buka halaman client : https://www.rayhannovelo.com/demo/batm_client/public/
2. login menggunakan email = test@gmail.com , password = test@gmail.com atau register terlebih dahulu
3. isi field name, email, phone number, dan address pada form penambahan customer 
4. apabila format email yang diinput salah, maka menampilkan error "Email format is invalid!"

* Pengujian menggunakan postman

API token public : bN38mu1EVIsDBQZGh6TCh98SwMiZC3abVgUQd2jHqaxfQmXyp7LWmLGVort0

1. Pengecekan data customer sebelum batch processing : https://demo.rayhannovelo.com/batm_server/public/api/customer?api_token=bN38mu1EVIsDBQZGh6TCh98SwMiZC3abVgUQd2jHqaxfQmXyp7LWmLGVort0

2. Penambahan data customer : (https://www.rayhannovelo.com/demo/batm_server/public/api/customer/store?api_token=bN38mu1EVIsDBQZGh6TCh98SwMiZC3abVgUQd2jHqaxfQmXyp7LWmLGVort0) , pilih method post pada postman, pilih Body, kemudian pilih form-data, lalu isi key (name, email, phone number, dan address) beserta value yang diinginkan

3. Pengecekan data customer sesudah batch processing (Batch Processing dilakukan setiap 5 menit sesuai waktu server) : https://demo.rayhannovelo.com/batm_server/public/api/final_customer?api_token=bN38mu1EVIsDBQZGh6TCh98SwMiZC3abVgUQd2jHqaxfQmXyp7LWmLGVort0

* contoh hasil API (JSON)

1. jika tidak menggunakan api token atau salah : 
{
    "error": "Unauthenticated."
}

2. jika pengecekan data customer berhasil : 
{
    "message": "Success!",
    "api": "bN38mu1EVIsDBQZGh6TCh98SwMiZC3abVgUQd2jHqaxfQmXyp7LWmLGVort0",
    "values": [
        {
            "id": 1,
            "name": "name",
            "email": "email@gmail.com",
            "phone": "phone",
            "address": "address",
            "created_at": "2019-08-06 08:50:27",
            "updated_at": "2019-08-06 08:50:27"
        }
    ]
}

3. jika pengecekan data customer kosong akan menampilkan json : 
{
    "message": "Empty!"
}

4. jika penambahan data customer berhasil : 
{
    "message": "Success!",
    "code": 200
}

5. jika penambahan data customer gagal : 
{
    "message":"Failed!"
}
