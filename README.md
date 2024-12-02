# Project Laravel
## Website Opentalk

### Fitur-fitur
- Halaman Login menggunakan NRP serta password yang disimpan dalam database.

- Halaman home page (Untuk sambutan bagi user serta penjelasan singkat mengenai project nya bisa juga tujuan project).

- Halaman keluhan, dibagi menjadi 2 bagian 
    1. Keluhan yang bisa di pending (yang ini bisa di bagi-bagi berdasarkan kategori jadi 1 kategori 1 halaman sendiri).
    2. Keluhan yang diadakan di opentalk alias live (jadi yang ini kita jadiin 1 aja semua kategori, tapi yang pasti kasih tombol sort juga buat ngesort kategori) --> untuk yang ini bisa dilihat pada source di bawah untuk referensi nya, ada fitur votes, tipe kategori serta status baik sudah di jawab atau belum.

- Form buat nambah keluhan:
    1. yang tidak live, buat halaman sendiri untuk nambah keluhan, tidak dijadikan 1 pada tampilan di poin ketiga (anggapannya bisa dimasukin ke header).
    2. kalau yang di live, sediakan tombol untuk menambah keluhan langsung pada halaman tersebut.

- Di bagian paling bawah / footer tambahain info tambahan contact serta FAQ (FAQ disini bisa untuk pertanyaan" umum contohnya bagaimana cara menambah keluhan/melihat keluhan DLL).

- setiap user ada notification, notification disini berguna untuk memberi tau user bahwa keluhan nya sudah di jawab atau belum.

- admin panel, emang kita konsep nya rahasia, tapi buat jaga-jaga cuman orang tertentu saja bisa melihat siapa yang memberikan keluhan jika ada keluhan yang tidak senonoh.

### Source that can be used
1. [Uservoice](https://www.uservoice.com/)
