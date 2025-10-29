<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Penyakit;
use App\Models\Gejala;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'id' => '2',
            'name' => 'Zaidan',
            'role' => 'umum',
            'email' => 'zaidan@gmail.com',
            'alamat' => 'Jalan Karang Anyar No. 59 RT 05 RW 01 Sudagaran, Banyumas',
            'kecamatan' => 'Banyumas',
            'desa' => 'Sudagaran',
            'password' => bcrypt('banyumas')
        ]);

        Penyakit::create([
            'id' => '1',
            'nama_penyakit' => 'Penggerek Batang Padi',
            'kategori' => 'Hama',
            'gambar' => 'img/penggerek_batang_padi.jpg',
            'deskripsi' => '
                <p align="justify">
                   Penggerek Batang Padi merupakan hama yang sangat penting pada padi dan sering menimbulkan kerusakan yang menurunkan hasil panen secara nyata. Terdapatnya Penggerek di lapang dapat dilihat dari adanya ngengat di pertanaman dan larva di dalam batang. Mekanisme kerusakannya adalah larva makan sistem pembuluh tanaman di dalam batang.
                   Stadia tanaman yang rentan terhadap serangan Penggerek adalah dari pembibitan sampai pembentukan malai. Gejala kerusakan yang ditimbulkannya mengakibatkan anakan kerdil atau mati yang disebut sundep dan beluk. Siklus hidupnya 40-70 hari tergantung pada spesiesnya.
                   Ambang ekonomi Penggerek batang adalah 10% rumpun terserang; 4 kelompok telur per rumpun (pada fase bunting). Perlu diketahui bahwa bila kerusakan sudah terlihat maka tindakan pengendalian sudah terlambat atau tidak efektif lagi.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Aplikasi insektisida dilakukan bila keadaan serangan melebihi ambang ekonomi atau jika populasi ngengat meningkat pada saat tanaman fase generatif. Gunakan insektisida yang berbahan aktif:</span>
                    <ul>
                        <li>karbofuran</li>
                        <li>bensultap</li>
                        <li>bisultap</li>
                        <li>karbosulfan</li>
                        <li>dimehipo</li>
                        <li>amitraz</li>
                        <li>fipronil</li>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '2',
            'nama_penyakit' => 'Wereng Coklat',
            'kategori' => 'Hama',
            'gambar' => 'img/wereng_coklat.jpg',
            'deskripsi' => '
                <p align="justify">
                   Wereng sebelumnya termasuk hama sekunder dan menjadi hama penting akibat adanya penyemprotan pestisida yang tidak tepat pada awal pertumbuhan tanaman, sehingga membunuh musuh alami. Pertanaman yang dipupuk nitrogen tinggi dengan jarak tanam rapat merupakan kondisi yang sangat disukai Wereng.
                   Stadia tanaman yang rentan terhadap serangan Wereng Coklat adalah dari pembibitan sampai fase matang susu. Gejala kerusakan yang ditimbulkannya adalah tanaman menguning dan cepat sekali mengering. Umumnya gejala terlihat mengumpul pada satu lokasi - melingkar yang disebut hopperburn.
                   Ambang ekonomi hama ini adalah 15 ekor per rumpun. Siklus hidupnya 21-33 hari. Mekanisme kerusakan adalah menghisap cairan tanaman pada sistem vaskular (pembuluh tanaman).
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Penanganan untuk serangan Wereng Coklat antara lain</span>
                    <ul>
                        <li>Pemberian pupuk K untuk mengurangi kerusakan</li>
                        <li>Insektisida (bila diperlukan) antara lain yang berbahan aktif:</li>
                        <ul>
                            <li>amitraz</li>
                            <li>buprofezin</li>
                            <li>beauveria bassiana 6.20 x 1010 cfu/ml</li>
                            <li>BPMC</li>
                            <li>fipronil</li>
                            <li>imidakloprid</li>
                            <li>karbofuran</li>
                            <li>karbosulfan</li>
                            <li>metolkarb</li>
                            <li>MIPC</li>
                            <li>propoksur</li>
                            <li>tiametoksam</li>
                        </ul>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '3',
            'nama_penyakit' => 'Kepinding Tanah',
            'kategori' => 'Hama',
            'gambar' => 'img/kepinding_tanah.jpg',
            'deskripsi' => '
                <p align="justify">
                   Kepinding Tanah umumnya hanya menimbulkan masalah di beberapa lokasi tertentu dan menyerang padi dari fase pembibitan sampai tanaman dewasa.
                   Gejala kerusakan adalah di daerah sekitar lubang bekas hisapan berubah warna menjadi coklat menyerupai gejala penyakit Blas. Daun menjadi kering dan menggulung secara membujur. Gejala seperti sundep dan beluk merupakan gejala kerusakan yang umum yang menyebabkan gabah setengah berisi atau hampa.
                   Ambang ekonomi adalah 5 ekor nimfa atau Kepinding dewasa per rumpun. Bila terdapat 10 ekor Kepinding dewasa per rumpun dapat mengakibatkan kehilangan hasil sampai 35%. Siklus hidupnya adalah 28-35 hari. Mekanisme kerusakan adalah menghisap cairan tanaman.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Untuk penanganan, Kepinding Tanah dewasa sangat tertarik kepada lampu perangkap, karena itu Kepinding Tanah yang terperangkap perlu dibakar dan dibunuh</span>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '4',
            'nama_penyakit' => 'Walang Sangit',
            'kategori' => 'Hama',
            'gambar' => 'img/walang_sangit.jpg',
            'deskripsi' => '
                <p align="justify">
                   Walang Sangit merupakan hama yang umum merusak bulir padi pada fase pemasakan.
                   Serangga apabila diganggu akan mempertahankan diri dengan mengeluarkan bau. Selain sebagai mekanisme pertahanan diri, bau yang dikeluarkan juga digunakan untuk menarik Walang Sangit lain dari spesies yang sama.
                   Fase pertumbuhan tanaman padi yang rentan terhadap serangan Walang Sangit adalah dari keluarnya malai sampai matang susu. Kerusakan yang ditimbulkannya menyebabkan beras berubah warna dan mengapur, serta hampa. 
                   Ambang ekonomi Walang Sangit adalah lebih dari 1 ekor Walang Sangit per dua rumpun pada masa keluar malai sampai fase pembungaan. Mekanisme merusaknya yaitu menghisap butiran gabah yang sedang mengisi.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Penanganan untuk serangan Walang Sangit antara lain</span>
                    <ul>
                        <li>Kendalikan gulma di sawah dan di sekitar pertanaman</li>
                        <li>Ratakan sawah dan pupuk secara merata agar pertumbuhan tanaman seragam</li>
                        <li>Tangkap walang sangit dengan menggunakan jaring sebelum stadia pembungaan</li>
                        <li>Umpan walang sangit dengan menggunakan ikan yang sudah busuk, daging yang sudah rusak, atau dengan kotoran ayam</li>
                        <li>Aplikasi insektisida dilakukan apabila serangan sudah mencapai ambang ekonomi</li>
                        <li>Aplikasi insektisida sebaiknya dilakukan pada pagi- pagi sekali atau sore hari ketika walang sangit berada di kanopi</li>
                        <li>Penggunaan insektisida (bila diperlukan) antara lain yang berbahan aktif:
                        <ul>
                            <li>BPMC</li>
                            <li>fipronil</li>
                            <li>metolkarb</li>
                            <li>MIPC</li>
                            <li>propoksur</li>
                        </ul>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '5',
            'nama_penyakit' => 'Tikus',
            'kategori' => 'Hama',
            'gambar' => 'img/tikus.jpg',
            'deskripsi' => '
                <p align="justify">
                   Tikus merusak tanaman pada semua fase pertumbuhan, dan dapat menyebabkan kerusakan besar jika serangan terjadi setelah pembentukan primordia, sewaktu Tikus memakan titik tumbuh, atau memotong pangkal batang untuk memakan butir gabah. Tanda-tanda pangkal batang yang dimakan Tikus berbeda dengan kerusakan akibat penggerek padi.
                   Jika kerusakan terjadi lebih awal, tanaman dapat membentuk anakan baru, sehingga menjelang panen kelihatan mempunyai malai muda di tengah malai masak di tepinya.
                   Tikus menyerang tanaman pada malam hari dan pada siang hari Tikus bersembunyi di lubang pada tanggul irigasi, pematang, pekarangan, dan semak atau gulma. Selama masa bera, Tikus berada di lubang tanggul irigasi dan kebun-kebun. Pada saat tanaman padi baru fase anakan, 75% waktunya berada di lubang sepanjang tepi-tepi sungai dan jalan dan sesudah tanaman memasuki fase anakan maksimum, 65% waktunya berada di pertanaman padi.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Keberhasilan pengendalian Tikus ditentukan oleh aktivitas kelompok tani. Oleh karena itu organisasi pengendalian OPT yang ada perlu diaktifkan, sehingga pelaksanaan pengendalian lebih terkoordinasi dalam skala luas, mulai dari pra- tanam/pengolahan tanah sampai menjelang panen. Urutan penggunaan teknologi pengendalian tikus sejalan dengan budi daya tanaman atau stadia tanaman padi adalah sebagai berikut:</span>
                    <ul>
                        <li>Pra-tanam/pengolahan tanah</li>
                            <ul>
                                <li>Pemantauan dini populasi tikus di sekitar tanggul irigasi, pematang, jalan desa, dan batas kampung. Bila ditemukan gejala/tanda adanya tikus segera laporkan kepada kelompok</li>
                                <li>Lakukan sanitasi dan buru tikus di tempat ditemukannya gejala tersebut</li>
                                <li>Perburuan dibantu anjing, jala perangkap, dan emposan belerang</li>
                            </ul>
                        <li>Pesemaian</li>
                            <ul>
                                <li>Perburuan tikus (gropyok massal), di berbagai habitat tikus dengan cara menggali lubang, memompa lubang dengan lumpur atau air, emposan belerang, jala perangkap, dan dibantu anjing</li>
                                <li>Pemagaran persemaian dengan lembaran plastik dilengkapi bubu perangkap tikus (terutama di daerah endemis).</li>
                            </ul>
                        <li>Fase vegetatif</li>
                            <ul>
                                <li>Perlindungan tanaman menggunakan sistem perangkap bubu (SPB = TBS = Trdp Bdrrier System) (Gambar 16). Tanaman perangkap berupa tanaman padi yang ditanam tiga minggu lebih awal dari tanaman petani umumnya (baru pesemaian). Petak tanaman perangkap berukuran 10 m x 10 m atau 25 m x 25 m, dekat habitat tikus, dipagar plastik sekelilingnya setinggi 60 cm, ditopang ajir bambu (Gambar 17). Tiap sisi dilengkapi satu bubu perangkap ukuran 25 x 25 x 60 cm. Perangkap bubu terbuat dari ram kawat atau blek bekas minyak. Di sekeliling tanaman perangkap dibuat parit air (40 cm) agar tikus tidak membuat atau menggali lubang di bawah pagar. Pemeriksaan bubu dilakukan setiap hari untuk mengeluarkan tikus dan hewan lain yang terperangkap tidak mati di bubu. Satu unit SPB mampu mengamankan tanaman seluas 5-40 ha dari serangan tikus.</li>
                                <li>Perlindungan tanaman menggunakan bentangan pagar perangkap bubu linier (LTBS) tanpa tanaman perangkap, terdiri dari bentangan pagar plastik 100 m, tinggi 60 cm, ditopang ajir bambu. Setiap jarak bentangan 20 m dilengkapi bubu perangkap. LTBS dipasang di perbatasan tanaman dengan habitat sebagai sarang tikus. LTBS mudah dipasang-bongkar sesuai keperluan. Penangkapan tikus selama 3- 5 hari atau tidak ada tikus tertangkap.</li>
                                <li>LTBS efektif untuk penangkapan tikus migrasi.</li>
                                <li>Pemasangan umpan rodentisida antikoagulan dan pengemposan belerang.</li>
                            </ul>
                        <li>Fase primordia, berbunga, pematangan bulir menjelang panen</li>
                            <ul>
                                <li>Pengemposan lubang aktif dengan belerang</li>
                                <li>Pemasangan LTBS dengan arah muka perangkap bubu berselang seling agar tikus terperangkap dari dua arah terutama di lokasi terserang berat.</li>
                            </ul>
                        <span>Pengumpanan dengan rodentisida juga dapat dilaku- kan dengan bahan aktif brodifakum, kumatetralil, seng fosfida, bromadiolon, atau flokumafen.</span>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '6',
            'nama_penyakit' => 'Ganjur',
            'kategori' => 'Hama',
            'gambar' => 'img/ganjur.jpg',
            'deskripsi' => '
                <p align="justify">
                   Ganjur umumnya bukan masalah utama di pertanaman padi. Serangga dewasanya seperti nyamuk kecil, dengan daya terbang yang relatif lemah sehingga penyebarannya hanya lokal saja.
                   Stadia tanaman padi yang rentan terhadap serangan Ganjur adalah dari fase pembibitan sampai pembentukan malai. Ganjur dewasa aktif pada malam hari dan sangat tertarik pada cahaya.
                   Ciri kerusakan yang ditimbulkannya adalah daun menggulung seperti daun bawang. Ukuran daun bawang bisa panjang, bisa juga kecil/pendek sehingga sulit dilihat. Anakan yang memiliki gejala seperti daun bawang ini tidak akan menghasilkan malai. Pada saat tanaman mencapai fase pembentukan bakal malai, larva tidak lagi menyebabkan kerusakan. Siklus hidup ganjur 28-32 hari dan larvanya memakan titik tumbuh tanaman.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Penanganan untuk serangan Ganjur antara lain</span>
                    <ul>
                        <li>Atur waktu tanam agar puncak curah hujan tidak bersamaan dengan stadia vegetatif.</li>
                        <li>Bajak ratun/tunggul dari tanaman sebelumnya dan buang/bersihkan semua tanaman inang alternatif selama masa bera, seperti padi liar Oryzd rufipogon untuk mengurangi infestasi hama</li>
                        <li>Hama ganjur dewasa sangat tertarik terhadap cahaya, oleh karena itu lampu perangkap dapat digunakan untuk menangkap hama ganjur dewasa</li>
                        <li>Insektisida granular yang berbahan aktif karbofuran dapat digunakan karena bekerja secara sistemik.</li>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '7',
            'nama_penyakit' => 'Hama Putih Palsu',
            'kategori' => 'Hama',
            'gambar' => 'img/hama_putih_palsu.jpg',
            'deskripsi' => '
                <p align="justify">
                   Hama Putih Palsu sebenarnya jarang menjadi masalah utama di pertanaman padi. Serangannya menjadi masalah besar jika kerusakan pada daun bendera sangat tinggi (>50%) pada fase anakan maksimum dan fase pematangan. Kerusakan akibat serangan larva Hama Putih Palsu terlihat dengan adanya warna putih pada daun di pertanaman.
                   Larva makan jaringan hijau daun dari dalam lipatan daun meninggalkan permukaan bawah daun yang berwarna putih. Siklus hidup hama ini 30-60 hari.
                   Tanda pertama adanya infestasi adalah kehadiran ngengat di sawah. Ngengat berwarna kuning coklat, pada bagian sayap depan ada tanda pita hitam sebanyak 3 buah yang garisnya lengkap maupun terputus. Pada saat beristirahat, ngengat membentuk segitiga.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Penanganan untuk serangan Hama Putih Palsu antara lain</span>
                    <ul>
                        <li>Jangan menyemprot insektisida sebelum tanaman berumur 30 hari setelah tanam pindah atau 40 hari sesudah sebar benih. Tanaman padi yang terserang pada fase ini dapat pulih apabila air dan pupuk di kelola dengan baik.</li>
                        <li>Gunakan insektisida (bila diperlukan) yang berbahan aktif fipronil atau karbofuran</li>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '8',
            'nama_penyakit' => 'Hama Putih',
            'kategori' => 'Hama',
            'gambar' => 'img/hama_putih.jpg',
            'deskripsi' => '
                <p align="justify">
                   Hama Putih jarang menyebabkan masalah di pertanaman padi. Tanda adanya hama ini di lapang adalah dari ngengat kecil dan larva. Stadia tanaman yang paling rentan adalah pada fase pembibitan sampai stadia anakan. Stadia hama yang merusak adalah stadia larva. Siklus hidup Hama Putih adalah 35 hari.
                   Kerusakan pada daun yang khas yaitu daun terpotong seperti digunting. Daun yang terpotong tersebut dibuat menyerupai tabung yang digunakan larva untuk membungkus dirinya, dimana larva aman dengan benang-benang sutranya. Larva bernafas dari dalam tabung dan memerlukan air di sawah. Gulungan daun yang berisi larva akan mengapung di atas permukaan air pada siang hari dan makan pada malam hari. Larva akan memanjat batang padi membawa gulungan daunnya yang berisi air untuk pernafasannya. Tingkat ambang ekonomi adalah lebih dari 25% daun rusak atau 10 daun rusak per rumpun.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Penanganan untuk serangan Hama Putih dengan insektisida (bila diperlukan) gunakan yang berbahan aktif:</span>
                    <ul>
                        <li>fipronil</li>
                        <li>karbofuran</li>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '9',
            'nama_penyakit' => 'Ulat Tentara atau Grayak',
            'kategori' => 'Hama',
            'gambar' => 'img/grayak.jpg',
            'deskripsi' => '
                <p align="justify">
                   Ngengat dewasa aktif pada malam hari. Pada malam hari serangga dewasa makan, berkopulasi, dan bermigrasi, sedangkan pada siang hari ngengat beristirahat di dasar tanaman. Ngengat sangat tertarik terhadap cahaya.
                   Kerusakan terjadi karena larva makan bagian atas tanaman pada malam hari dan cuaca yang berawan. Daun yang dimakan dimulai dari tepi daun sampai hanya meninggalkan tulang daun dan batang. Larvanya sangat rakus, dan semua stadia tanaman padi dapat diserangnya, mulai dari pembibitan, khususnya pembibitan kering, sampai fase pengisian. M. sepdrdtd dapat memotong malai pada pangkalnya dan dikenal sebagai ulat pemotong leher malai 
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Penanganan untuk serangan Ulat Tentara atau Grayak dengan insektisida (bila diperlukan) gunakan yang berbahan aktif:</span>
                    <ul>
                        <li>BPMC</li>
                        <li>karbofuran</li>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '10',
            'nama_penyakit' => 'Ulat Tanduk Hijau',
            'kategori' => 'Hama',
            'gambar' => 'img/ulat_tanduk_hijau.jpg',
            'deskripsi' => '
                <p align="justify">
                   Ngengat tidak tertarik pada cahaya. Ngengat berupa kupu-kupu yang berukuran besar yang sangat mudah dikenali karena pada sayapnya terdapat bercak seperti bentuk mata.
                   Larva memiliki 2 pasang tanduk, satu pasang ada di bagian ujung kepala, dan satu pasang lainnya ada di bagian ujung abdomen. Larva penyebab kerusakan pada tanaman, makan daun mulai dari pinggiran dan ujung daun. Fase pertumbuhan tanaman yang diserang adalah dari fase anakan sampai pembentukan malai.
                   Inangnya, selain tanaman padi, juga rumput-rumputan, tebu, sorgum, Andstrophus sp, Imperdtd sp, dan Pdnicum spp.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Penanganan untuk serangan Ulat Tanduk Hijau paling baik dengan memanfaatkan musuh alami, seperti parasit telur Trichogrammatidae. Oleh karena itu pengendalian secara kimiawi dengan menyemprot insektisida tidak dianjurkan pada saat tanaman berumur 30 hari setelah tanam pindah atau 40 hari setelah sebar benih</span>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '11',
            'nama_penyakit' => 'Ulat Jengkal Palsu Hijau',
            'kategori' => 'Hama',
            'gambar' => 'img/ulat_jengkal_palsu_hijau.jpg',
            'deskripsi' => '
                <p align="justify">
                   Populasi tinggi dapat terjadi sejak di persemaian hingga anakan maksimum. Larva muda memarut jaringan epidermis tanaman meninggalkan lapisan bawah daun yang berwarna putih.
                   Larva yang sudah tua makan dari pinggiran daun. Larva bergerak seperti ulat jengkal dengan cara melengkungkan bagian belakang tubuhnya
                   Tanaman padi yang diberi pupuk dengan takaran tinggi sangat disukai hama ini. Populasinya meningkat selama musim hujan. Ngengatnya aktif pada malam hari, dan pada siang hari bersembunyi di dasar tanaman atau di rumput-rumputan.
                   Hama ini jarang menyebabkan kehilangan hasil karena tanaman yang terserang dapat sembuh kembali dan juga musuh alami dapat menekan populasi hama ini.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Penanganan untuk serangan Ulat Jengkal Palsu Hijau paling baik dengan memanfaatkan musuh alami sebagai cara pengendalian terhadap hama ini, seperti parasit telur Trichogrammatidae; parasit larva dan pupa seperti Ichneumonidae, Braconidae, Eulophidae, Chalcidae; serta laba-laba pemangsa ngengat.</span>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '12',
            'nama_penyakit' => 'Orong-Orong',
            'kategori' => 'Hama',
            'gambar' => 'img/orong_orong.jpg',
            'deskripsi' => '
                <p align="justify">
                   Orong-Orong jarang menjadi masalah di sawah, tapi sering ditemukan di lahan pasang surut dan biasanya hanya terdapat di sawah yang kering yang tidak digenangi. Menggenangi tanaman menyebabkan Orong-Orong pindah ke pematang.
                   Hama ini memiliki tungkai depan yang besar. Siklus hidupnya 6 bulan. Stadia tanaman yang rentan terhadap serangan hama ini adalah fase pembibitan sampai anakan. Benih yang disebar di pembibitan juga dapat dimakannya.
                   Hama ini memotong tanaman pada pangkal batang dan orang sering keliru dengan gejala kerusakan yang disebabkan oleh penggerek batang (sundep). Orong-Orong merusak akar muda dan bagian pangkal tanaman yang berada di bawah tanah. Pertanaman padi muda yang diserangnya mati sehingga terlihat adanya spot-spot kosong di sawah.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Penanganan untuk serangan Orong-Orong antara lain.</span>
                    <ul>
                        <li>Orong-Orong biasanya ada di sawah yang tidak digenangi atau di sawah yang tanahnya tidak rata; oleh karena itu perataan tanah penting agar air tergenang merata</li>
                        <li>Penggenangan sawah 3-4 hari dapat membantu membunuh telur Orong-Orong di tanah</li>
                        <li>Penggunaan umpan (sekam dicampur insektisida)</li>
                        <li>Penggunaan insektisida (bila diperlukan) yang berbahan aktif karbofuran dan fipronil</li>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '13',
            'nama_penyakit' => 'Lalat Bibit',
            'kategori' => 'Hama',
            'gambar' => 'img/lalat_bibit.jpg',
            'deskripsi' => '
                <p align="justify">
                   Lalat Bibit menyerang tanaman padi yang baru ditanam pindah pada sawah yang selalu tergenang. Stadia hama yang merusak tanaman padi adalah larvanya. Larva Lalat Bibit berwarna kuning kehijau-hijauan yang tembus cahaya, berada di bagian tengah daun yang masih menggulung. Larva bergerak ke bagian tengah tanaman merusak jaringan bagian dalam sampai titik tumbuh daun.
                   Gejala kerusakan adalah bercak-bercak kuning yang dapat dilihat di sepanjang tepi daun yang baru muncul dan daun yang terserang mengalami perubahan bentuk. Telur diletakkan pada permukaan atas daun, berwarna keputih-putihan dan berbentuk lonjong seperti pisang. Siklus hidupnya 4 minggu.
                   Tanaman yang terserang anakannya menjadi berkurang dan serangan berat dapat memperlambat fase pematangan 7-10 hari. Tanaman pada dasarnya dapat mengkompensasi asalkan tidak ada serangan hama lainnya atau tekanan lingkungan yang mempengaruhi.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Penanganan untuk serangan Lalat Bibit antara lain.</span>
                    <ul>
                        <li>Keringkan sawah</li>
                        <li>Pengendalian Lalat Bibit yang tepat adalah pencegahan karena ketika gejala kerusakan terlihat di lapang, Lalat Bibit sudah tidak ada di pertanaman</li>
                        <li>Penggunaan insektisida (bila diperlukan) adalah yang berbahan aktif:</li>
                            <ul>
                                <li>bensultap</li>
                                <li>BPMC</li>
                                <li>karbofuran</li>
                            </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '14',
            'nama_penyakit' => 'Keong Mas',
            'kategori' => 'Hama',
            'gambar' => 'img/keong_mas.jpg',
            'deskripsi' => '
                <p align="justify">
                   Keong Mas merusak tanaman dengan cara memarut jaringan tanaman dan memakannya, menyebabkan adanya bibit yang hilang di pertanaman. Bekas potongan daun dan batang yang diserangnya terlihat mengambang.
                   Waktu kritis untuk mengendalikan Keong Mas adalah pada saat 10 hari setelah tanam pindah, atau 21 hari setelah sebar benih (benih basah).
                   Setelah itu laju pertumbuhan tanaman lebih besar daripada laju kerusakan oleh Keong Mas.
                   Bila di sawah diketahui ada Keong Mas, perlu dilakukan pengaturan air karena Keong Mas menyenangi tempat-tempat yang digenangi air. Jika petani menanam dengan sistem tanam pindah maka pada 15 hari setelah tanam pindah, sawah perlu dikeringkan kemudian digenangi lagi secara bergantian (f/dsh f/ood = intermitten irrigdtion). Bila petani menanam dengan sistem tabela (tanam benih secara langsung), selama 21 hari setelah sebar benih sawah perlu dikeringkan kemudian digenangi lagi secara bergantian. Selain itu perlu dibuat caren di dalam dan di sekeliling petakan sawah sebelum tanam, baik di musim hujan maupun kemarau. Ini dimaksudkan agar pada saat dilakukan pengeringan, Keong Mas akan menuju caren sehingga memudahkan pengambilan Keong Mas dan sebagai salah satu cara pengendaliannya.
                   Keberadaannya di lapang ditandai oleh adanya telur berwarna merah muda dan keong mas dengan berbagai ukuran dan warna. Keong mas merupakan salah satu hama penting yang menyerang padi muda terutama di sawah yang ditanam dengan sisem tabela.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Penanganan untuk serangan Keong Mas antara lain.</span>
                    <ul>
                        <li>Secara fisik, gunakan saringan berukuran 5 mm mesh yang dipasang pada tempat air masuk di pematang untuk meminimalkan masuknya keong mas ke sawah dan memudahkan pemungutan dengan tangan</li>
                        <li>Secara mekanis, pungut dengan tangan satu per satu. Telur keong mas yang terlihat dihancurkan dengan kayu/bambu, baik sebelum atau sesudah tanam pindah</li>
                        <li>Bila di suatu lokasi sudah diketahui bahwa keong mas adalah hama utama, sebaiknya tanam bibit yang tua dan tanam lebih dari satu bibit per rumpun; buat caren di dalam dan di sekeliling petakan sawah</li>
                        <li>Bila diperlukan gunakan pestisida yang berbahan aktif niclos amida dan moluska botani seperti lerak dan deris</li>
                    </ul>
                    <span>Aplikasi pestisida dilakukan di sawah yang tergenang, di caren, atau di cekungan-cekungan yang ada airnya tempat keong mas berkumpul.</span>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '15',
            'nama_penyakit' => 'Burung',
            'kategori' => 'Hama',
            'gambar' => 'img/burung.jpg',
            'deskripsi' => '
                <p align="justify">
                   Burung menyerang tanaman padi yang sudah dalam fase matang susu sampai pemasakan biji (sebelum panen). Serangan mengakibatkan biji hampa, adanya gejala seperti beluk, dan biji banyak yang hilang.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Penanganan untuk serangan Burung antara lain.</span>
                    <ul>
                        <li>Penjaga burung mulai dari jam 6-10 pagi dan jam 2-6 sore, karena waktu-waktu tersebut merupakan waktu yang kritis bagi tanaman diserang burung</li>
                        <li>Gunakan jaring untuk mengisolasi sawah dari serangan burung; luas sawah yang di isolasi kurang dari 0,25 hektar</li>
                        <li>Bila tanam tabela:</li>
                        <ul>
                            <li>Bila diperlukan gunakan pestisida yang berbahan aktif niclos amida dan moluska botani seperti lerak dan deris</li>
                            <li>Benih yang sudah disebar di sawah ditutup dengan tanah</li>
                            <li>Benih yang digunakan harus lebih banyak</li>
                            <li>Gunakan orang-orangan atau tali yang diberi plastik untuk menakut-nakuti burung</li>
                            <li>Pekerjakan penjaga burung</li>
                            <li>Tanam serentak dengan sekitarnya, jangan menanam atau memanen di luar musim agar tidak dijadikan sebagai satu-satunya sumber makanan pada saat itu</li>
                        </ul>
                        <li>Kendalikan habitat/sarang burung</li>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '16',
            'nama_penyakit' => 'Hawar Daun bakteri',
            'kategori' => 'Penyakit',
            'gambar' => 'img/hawar_daun_bakteri.jpg',
            'deskripsi' => '
                <p align="justify">
                    Gejala penyakit berupa bercak berwarna kuning sampai putih berawal dari terbentuknya garis lebam berair pada bagian tepi daun. Bercak bisa mulai dari salah satu atau kedua tepi daun yang rusak, dan berkembang hingga menutupi seluruh helaian daun. Pada varietas yang rentan, bercak bisa mencapai pangkal daun terus ke pelepah daun.
                    Infeksi pada pembibitan menyebabkan bibit menjadi kering. Bakteri menginfeksi masuk sistem vaskular tanaman padi pada saat tanam pindah atau sewaktu dicabut dari tempat pembibitan dan akarnya rusak, atau sewaktu terjadi kerusakan daun.
                    Apabila sel bakteri masuk menginfeksi tanaman padi melalui akar dan pangkal batang, tanaman bisa menunjukkan gejala kresek. Seluruh daun dan bagian tanaman lainnya menjadi kering. Infeksi dapat terjadi mulai dari fase persemaian sampai awal fase pembentukan anakan.
                    Sumber infeksi dapat berasal dari jerami yang terinfeksi, tunggul jerami, singgang dari tanaman yang terinfeksi, benih, dan gulma inang. Sel-sel bakteri membentuk butir-butir embun pada waktu pagi hari yang mengeras dan melekat pada permukaan daun.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Pengendalian untuk serangan penyakit Hawar Daun Bakteri antara lain.</span>
                    <ul>
                        <li>Sanitasi seperti membersihkan tunggul-tunggul dan jerami-jerami yang terinfeksi/sakit</li>
                        <li>Jika menggunakan kompos jerami, pastikan jerami dari tanaman sakit sudah terdekomposisi sempurna sebelum tanam pindah</li>
                        <li>Gunakan benih atau bibit yang bebas dari penyakit hawar Daun Bakteri</li>
                        <li>Gunakan pupuk nitrogen sesuai takaran anjuran</li>
                        <li>Jarak tanam jangan terlalu rapat</li>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '17',
            'nama_penyakit' => 'Bakteri Daun Bergaris',
            'kategori' => 'Penyakit',
            'gambar' => 'img/bakteri_daun_bergaris.jpg',
            'deskripsi' => '
                <p align="justify">
                    Infeksi penyakit ini biasanya terbatas pada helaian daun saja. Gejala yang timbul berupa bercak sempit berwarna hijau gelap yang lama-kelamaan membesar berwarna kuning dan tembus cahaya di antara pembuluh daun. Sejalan dengan berkembangnya penyakit, bercak membesar, berubah menjadi berwarna coklat, dan berkembang menyamping melampaui pembuluh daun yang besar. Seluruh daun varietas yang rentan bisa berubah warna menjadi coklat dan mati. Pada keadaan ideal untuk infeksi, seluruh pertanaman menjadi berwarna oranye kekuning-kuningan.
                    Bakteri memasuki tanaman melalui kerusakan mekanik atau melalui terbukanya sel secara alami. Butir-butir embun yang mengandung bakteri akan muncul pada permukaan daun. Hujan dan angin membantu penyebaran penyakit ini.
                    Stadia tanaman yang paling rentan adalah dari fase anakan sampai stadia pematangan. Pada infeksi yang berat, kehilangan hasil dapat mencapai 30%.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Pengendalian untuk serangan penyakit Bakteri Daun Bergaris antara lain.</span>
                    <ul>
                        <li>Buang atau hancurkan tunggul-tunggul dan jerami- jerami yang terinfeksi/sakit</li>
                        <li>Pastikan jerami dari tanaman sakit sudah ter- dekomposisi sempurna sebelum tanam pindah</li>
                        <li>Gunakan benih atau bibit yang bebas dari penyakit Bakteri Daun Bergaris</li>
                        <li>Gunakan pupuk nitrogen sesuai anjuran</li>
                        <li>Gunakan pupuk nitrogen sesuai anjuran</li>
                        <li>Berakan tanah sesudah panen</li>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '18',
            'nama_penyakit' => 'Blas',
            'kategori' => 'Penyakit',
            'gambar' => 'img/blas.jpg',
            'deskripsi' => '
                <p align="justify">
                    Penyakit Blas menginfeksi tanaman padi pada setiap fase pertumbuhan. Gejala khas pada daun yaitu bercak berbentuk belah ketupat - lebar di tengah dan meruncing di kedua ujungnya.
                    Ukuran bercak kira-kira 1-1,5 x 0,3-0,5 cm berkembang menjadi berwarna abu-abu pada bagian tengahnya. Daun-daun varietas rentan bisa mati. Bercak penyakit Blas sering sukar dibedakan dengan gejala bercak coklat He/minthosporium.
                    Blas dapat menginfeksi tanaman padi pada semua stadia pertumbuhan. Infeksi bisa terjadi juga pada ruas batang dan leher malai yang disebut Blas leher (neck b/dst). Leher malai yang terinfeksi berubah menjadi kehitam-hitaman dan patah, mirip gejala beluk oleh penggerek batang. Apabila Blas leher terjadi, hanya sedikit malai yang berisi atau bahkan hampa. Pemupukan nitrogen dalam takaran tinggi dan cuaca yang lembab, terutama musim hujan, menguntungkan bagi terjadinya infeksi.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Pengendalian untuk serangan penyakit Blas antara lain.</span>
                    <ul>
                        <li>Gunakan beberapa varietas tahan secara bergantian untuk mengantisipasi perubahan ras cendawan yang relatif cepat</li>
                        <li>Gunakan pupuk nitrogen sesuai anjuran</li>
                        <li>Upayakan waktu tanam yang tepat, agar waktu awal pembungaan (hedding) tidak banyak embun dan hujan terus-menerus</li>
                        <li>Pengendalian secara kimiawi, gunakan fungisida (bila diperlukan) yang berbahan aktif metil tiofanat atau fosdifen dan kasugamisin</li>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '19',
            'nama_penyakit' => 'Hawar Pelepah Daun',
            'kategori' => 'Penyakit',
            'gambar' => 'img/hawar_pelepah_daun.jpg',
            'deskripsi' => '
                <p align="justify">
                    Infeksi penyakit ini periodik/hanya pada waktu-waktu tertentu di mana suhu udara dan kelembaban tinggi, dan tanaman yang diberi pupuk nitrogen/urea dengan takaran tinggi. Gejala penyakit dapat terlihat dari stadia anakan sampai stadia matang susu, yaitu pada pelepah daun, di antara permukaan air dan daun terdapat bercak/spot keabu-abuan yang berbentuk oval memanjang atau berbentuk elips.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Pengendalian untuk serangan penyakit Hawar Pelepah Daun antara lain.</span>
                    <ul>
                        <li>Atur pertanaman di lapang agar jangan terlalu rapat</li>
                        <li>Keringkan sawah beberapa hari pada saat anakan maksimum</li>
                        <li>Bajak yang dalam untuk mengubur sisa-sisa tanaman yang terinfeksi</li>
                        <li>Rotasi tanaman dengan kacang-kacangan untuk menurunkan serangan penyakit</li>
                        <li>Buang gulma dan tanaman yang sakit dari sawah</li>
                        <li>Gunakan fungisida (bila diperlukan) antara lain yang berbahan aktif:</li>
                        <ul>
                            <li>heksakonazol</li>
                            <li>karbendazim</li>
                            <li>tebukanazol</li>
                            <li>belerang</li>
                            <li>flutalonil</li>
                            <li>difenokonazol</li>
                            <li>propikonazol</li>
                            <li>validamisin A</li>
                        </ul>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '20',
            'nama_penyakit' => 'Busuk Batang',
            'kategori' => 'Penyakit',
            'gambar' => 'img/busuk_batang.jpg',
            'deskripsi' => '
                <p align="justify">
                    Infeksi penyakit ini terjadi pada batang yang dekat dengan permukaan air, masuk melalui pembengkakan dan kerusakan. Gejala awal berupa bercak berwarna kehitam-hitaman, bentuknya tidak teratur pada sisi luar pelepah daun dan secara bertahap membesar. Akhirnya, cendawan menembus batang padi yang kemudian menjadi lemah, anakan mati, dan akibatnya tanaman rebah.
                    Stadia tanaman yang paling rentan adalah pada fase anakan sampai stadia matang susu. Kehilangan hasil akibat penyakit ini dapat mencapai 80%.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Pengendalian untuk serangan penyakit Busuk Batang antara lain.</span>
                    <ul>
                        <li>Tunggul-tunggul padi sesudah panen dibakar atau didekomposisi</li>
                        <li>Keringkan petakan dan biarkan tanah sampai retak sebelum diari lagi</li>
                        <li>Gunakan pemupukan berimbang; pupuk nitrogen sesuai anjuran dan pemupukan K cenderung dapat menurunkan infeksi penyakit</li>
                        <li>Gunakan fungisida (bila diperlukan) yang berbahan aktif belerang atau difenokonazol</li>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '21',
            'nama_penyakit' => 'Busuk Pelepah Daun Bendera',
            'kategori' => 'Penyakit',
            'gambar' => 'img/busuk_pelepah_daun_bendera.jpg',
            'deskripsi' => '
                <p align="justify">
                    Infeksi terjadi pada pelepah daun paling atas yang menutupi malai muda pada akhir fase bunting.
                    Gejala awal adalah adanya noda berbentuk bulat memanjang hingga tidak teratur dengan panjang 0,5
                    - 1,5 cm, warna abu-abu di tengahnya dan coklat atau coklat abu-abu di pinggirnya. Bercak membesar, sering bersambung, dan bisa menutupi seluruh pelepah daun. Infeksi berat menyebabkan malai hanya muncul sebagian (tidak berkembang) dan mengerut. Malai yang muncul sebagian hanya dapat menghasilkan sedikit bulir yang berisi. Stadia tanaman yang paling rentan adalah saat keluar malai sampai matang susu.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Pengendalian untuk serangan penyakit Busuk Pelepah Daun Bendera antara lain.</span>
                    <ul>
                        <li>Bakar tunggul segera sesudah panen untuk mengurangi inokulum</li>
                        <li>Atur jarak tanam agar tidak terlalu rapat</li>
                        <li>Beri pupuk K pada fase anakan</li>
                        <li>Penyemprotan fungisida pada daun hanya dilakukan bila diperlukan yaitu pada fase bunting dan perlakuan benih yang berbahan aktif karbendazim atau mankozeb untuk mengurangi infeksi penyakit</li>
                        <li>Selain itu penyemprotan dengan fungisida (bila diperlukan) yang berbahan aktif benomil juga efektif menekan infeksi penyakit</li>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '22',
            'nama_penyakit' => 'Hawar Daun Jingga',
            'kategori' => 'Penyakit',
            'gambar' => 'img/hawar_daun_jingga.jpg',
            'deskripsi' => '
                <p align="justify">
                    Penyebab penyakit ini sampai sekarang belum diketahui secara pasti. Gejala awal penyakit ini dapat ditemukan pada daun dan pelepah daun. Gejalanya mulai terlihat sejak pertanaman padi memasuki fase generatif yaitu 50-60 hst untuk varietas berumur pendek, dan 60-80 hst untuk varietas berumur sedang. Gejala dapat juga dilihat pada stadia tanaman mulai berbunga sampai pemasakan. Gejala awal berupa bercak berwarna hijau kuning terang yang berkembang menuju ujung daun. Bercak lama-kelamaan menjadi nekrotik dan menyatu menyerupai gejala hawar daun. Penyakit ini dapat menurunkan hasil secara nyata.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Pengendalian untuk serangan penyakit Hawar Daun Jingga antara lain.</span>
                    <ul>
                        <li>Cara pengendalian penyakit ini juga belum ditemukan, tapi dari hasil penelitian di Vietnam dan Indonesia, aplikasi fungisida yang berbahan aktif carbendazim dan benomil yang disemprotkan pada daun dapat menekan munculnya gejala hawar daun jingga</li>
                        <li>Atur jarak tanam lebih lebar</li>
                        <li>Pengairan berselang ketika tanaman sudah mencapai pembentukan malai</li>
                        <li>Gunakan pemupukan berimbang</li>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '23',
            'nama_penyakit' => 'Tungro',
            'kategori' => 'Penyakit',
            'gambar' => 'img/tungro.jpg',
            'deskripsi' => '
                <p align="justify">
                    Di lapang, penyakit ini ditularkan oleh Wereng Hijau. Tanaman yang terinfeksi tumbuh kerdil dengan anakan sedikit. Daun mengalami perubahan warna dari hijau menjadi sedikit kuning sampai kuning oranye dan kuning coklat, dimulai dari ujung daun, terutama pada daun muda. Tanaman yang terinfeksi biasanya hidup hingga fase pemasakan. Pembungaan yang terlambat bisa menyebabkan tertundanya panen. Malai menjadi kecil, steril, dan tidak sempurna. Bercak coklat gelap menutupi bulir-bulir, sehingga bobot bulir lebih rendah daripada bulir tanaman sehat sehingga mengakibatkan hasil rendah. Tanaman tua yang terinfeksi bisa tidak memperlihatkan gejala serangan sebelum panen, tetapi singgang yang tumbuh bisa memperlihatkan gejala serangan dan menjadi sumber inokulum. Stadia pertumbuhan tanaman yang paling rentan adalah dari pembibitan sampai bunting. Kehilangan hasil dapat mencapai 68% ketika tanaman yang terinfeksi baru berumur 10-20 hari setelah sebar (hss); atau 30% apabila tanaman yang terinfeksi sudah berumur antara 40-50 hss; dan hanya 5% jika tanaman sudah berumur 70-80 hss.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Pengendalian untuk serangan penyakit Busuk Batang antara lain.</span>
                    <ul>
                        <li>Bila di pertanaman sudah terlihat gejala tungro, tanaman sakit dibuang</li>
                        <li>Pemberian insektisida dilakukan apabila sudah mencapai ambang batas ekonomi</li>
                        <li>Insektisida (bila diperlukan) antara lain yang berbahan aktif:</li>
                        <ul>
                            <li>BPMC</li>
                            <li>buprofezin</li>
                            <li>etofenproks</li>
                            <li>imidakloprid</li>
                            <li>karbofuran</li>
                            <li>MIPC</li>
                            <li>tiametoksam</li>
                        </ul>
                    </ul>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '24',
            'nama_penyakit' => 'Kerdil Rumput',
            'kategori' => 'Penyakit',
            'gambar' => 'img/kerdil_rumput.jpg',
            'deskripsi' => '
                <p align="justify">
                    Tanaman yang terinfeksi berat akan menjadi kerdil dengan anakan yang berlebihan, sehingga tampak seperti rumput. Daun tanaman padi menjadi sempit, pendek, kaku, berwarna hijau pucat sampai hijau, dan kadang-kadang terdapat bercak karat. Tanaman yang terinfeksi biasanya dapat hidup sampai fase pemasakan tetapi tidak memproduksi malai. Stadia pertumbuhan tanaman yang paling rentan adalah pada saat tanam pindah sampai bunting. Penyakit ini disebabkan oleh virus yang ditularkan oleh wereng coklat, dan tanaman inangnya hanya padi.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Pengendalian untuk serangan penyakit Kerdil Rumput dilakukan terhadap vektornya yaitu Wereng Coklat dan Hijau</span>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '25',
            'nama_penyakit' => 'Kerdil Hampa',
            'kategori' => 'Penyakit',
            'gambar' => 'img/kerdil_hampa.jpg',
            'deskripsi' => '
                <p align="justify">
                    Patogen penyebab penyakit kerdil hampa adalah virus yang ditularkan oleh wereng coklat. Tanaman yang terinfeksi menjadi kerdil. Gejala lainnya bervariasi tergantung fase pertumbuhan tanaman. Tanaman sehat dan sakit mempunyai anakan yang sama pada awalnya, tanaman sakit tetap hijau pada fase pemasakan dan mempunyai lebih banyak anakan daripada tanaman sehat. Daun-daun bergerigi merupakan gejala awal yang jelas pada fase awal tanaman muda. Pinggir daun yang tidak rata atau pecah-pecah dapat terlihat sebelum daun menggulung. Bagian helai daun yang rusak menunjukkan gejala khlorotik, menjadi kuning atau kuning kecoklat-coklatan, dan terpecah-pecah. Serangan pada daun bendera menyebabkan daun melintir, berubah bentuk, dan memendek pada fase bunting.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Karena ditularkan oleh wereng coklat, maka pengendalian yang tepat adalah dengan mengendalikan Wereng Coklat</span>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '26',
            'nama_penyakit' => 'Kahat Nitrogen',
            'kategori' => 'Penyakit',
            'gambar' => 'img/kahat_nitrogen.jpg',
            'deskripsi' => '
                <p align="justify">
                    Tanaman yang mengalami Kahat Nitrogen memperlihatkan gejala pertumbuhan tanaman kerdil dan menguning, daun lebih kecil dibandingkan daun tanaman sehat. Gejala umum kekurangan N pada tanaman muda adalah seluruh tanaman menguning, sedangkan pada tanaman tua gejalanya terlihat nyata pada daun bagian bawah (tua) yang berwarna hijau kekuning- kuningan hingga kuning. Selain itu, anakan yang dihasilkan berkurang dan terlambat berbunga, tetapi proses pemasakan lebih cepat sehingga kebernasan berkurang. Gabah dari malai yang dihasilkan juga berkurang.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Pengendalian untuk serangan penyakit Kahat Nitrogen dengan penggunaan pupuk urea (kandungan N sangat tinggi, 46%) atau ZA (Amonium Sulfat, mengandung N dan Sulfur).</span>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '27',
            'nama_penyakit' => 'Kahat Fosfor ',
            'kategori' => 'Penyakit',
            'gambar' => 'img/kahat_fosfor.jpg',
            'deskripsi' => '
                <p align="justify">
                    Gejala kekurangan fosfor menyebabkan pertumbuhan akar tanaman lambat, tanaman kerdil, daun berwarna hijau gelap dan tegak, lama-kelamaan daun berwarna keungu-unguan, anakan sedikit, waktu pembungaan terlambat atau tidak rata, umur tanaman/panen lebih panjang, dan gabah yang terbentuk berkurang. Secara umum, P telah diidentifikasi sebagai unsur hara yang penting bagi kesehatan akar tanaman dan menambah ketahanan tanaman terhadap keracunan besi.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Pengendalian untuk serangan penyakit Kahat Fosfor dengan penggunaan pupuk SP-36 (Super Fosfat 36%) atau TSP (Triple Superphosphate)</span>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '28',
            'nama_penyakit' => 'Kahat Kalium',
            'kategori' => 'Penyakit',
            'gambar' => 'img/kahat_kalium.jpg',
            'deskripsi' => '
                <p align="justify">
                   Tanaman padi yang kekurangan unsur hara K sebagian akarnya membusuk, tanaman kerdil, daun layu/terkulai, pinggiran dan ujung daun tua seperti terbakar (daun berubah warna menjadi kekuningan/oranye sampai kecoklatan yang dimulai dari ujung daun terus menjalar ke pangkal daun, anakan berkurang, ukuran dan berat gabah berkurang. Tanaman yang kahat kalium juga lebih rentan terhadap serangan hama dan penyakit, serta keracunan besi.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Pengendalian untuk serangan penyakit Kahat Kalium dengan penggunaan pupuk KCl (Kalium Klorida) atau pupuk NPK Majemuk dengan angka K yang tinggi (misalnya NPK 13-6-27).</span>
                </div>
            '
        ]);
        Penyakit::create([
            'id' => '29',
            'nama_penyakit' => 'Wereng Hijau',
            'kategori' => 'Hama',
            'gambar' => 'img/wereng_hijau.jpg',
            'deskripsi' => '
                <p align="justify">
                    Wereng Hijau merupakan hama penting karena dapat menyebarkan (vektor) virus tungro penyebab penyakit tungro. Fase pertumbuhan tanaman yang rentan terhadap serangan Wereng Hijau adalah dari fase pembibitan sampai pembentukan malai. Gejala kerusakan yang ditimbulkannya adalah tanaman menjadi kerdil, anakan berkurang, daun berubah warna menjadi kuning sampai kuning oranye. Ambang ekonomi adalah 5 ekor Wereng Hijau per rumpun. Jika tungro juga ada di lapang, 2 tanaman bergejala tungro per 1000 rumpun pertanda tungro telah ditularkan dan dapat merusak tanaman. Siklus hidup 23-30 hari. Wereng Hijau umumnya ditemukan di sawah irigasi dan tadah hujan, tidak lazim di pertanaman padi gogo. Wereng Hijau lebih menyukai menghisap cairan tanaman pada daun bagian pinggir daripada di pelepah daun atau daun bagian tengah. Hama ini sangat menyukai tanaman yang dipupuk nitrogen tinggi.
                </p>
            ',
            'penanganan' => '
                <div>
                    <span>Penanganan untuk Wereng Hijau antara lain.</span>
                    <ul>
                        <li>Pengendalian dilakukan jika di lapang terlihat gejala tungro</li>
                        <li>Pemberian insektisida dilakukan apabila sudah mencapai ambang batas ekonomi</li>
                        <li>Insektisida (bila diperlukan) antara lain yang berbahan aktif:</li>
                        <ul>
                            <li>BPMC</li>
                            <li>buprofezin</li>
                            <li>etofenproks</li>
                            <li>imidakloprid</li>
                            <li>karbofuran</li>
                            <li>MIPC</li>
                            <li>tiametoksam</li>
                        </ul>
                    </ul>
                </div>
            '
        ]);

        Gejala::create([
            'id' => '1',
            'nama_gejala' => 'terjadi Pada fase vegetatif'
        ]);
        Gejala::create([
            'id' => '2',
            'nama_gejala' => 'terjadi pada fase generatif'
        ]);
        Gejala::create([
            'id' => '3',
            'nama_gejala' => 'tanaman kerdil'
        ]);
        Gejala::create([
            'id' => '4',
            'nama_gejala' => 'tanaman menguning'
        ]);
        Gejala::create([
            'id' => '5',
            'nama_gejala' => 'pada tanaman muda seluruh tanaman akan menguning'
        ]);
        Gejala::create([
            'id' => '6',
            'nama_gejala' => 'tanaman mati'
        ]);
        Gejala::create([
            'id' => '7',
            'nama_gejala' => 'tanaman yang dicurigai sakit dapat hidup hingga fase pemasakan'
        ]);
        Gejala::create([
            'id' => '8',
            'nama_gejala' => 'tanaman yang dicurigai sedang sakit tetap hijau pada fase pemasakan'
        ]);
        Gejala::create([
            'id' => '9',
            'nama_gejala' => 'kerusakan hanya menyerang tanaman muda saja'
        ]);
        Gejala::create([
            'id' => '10',
            'nama_gejala' => 'tanaman padi (cepat) mengering'
        ]);
        Gejala::create([
            'id' => '11',
            'nama_gejala' => 'seluruh pertanaman menjadi berwarna orange kekuning-kuningan'
        ]);
        Gejala::create([
            'id' => '12',
            'nama_gejala' => 'tanaman padi rebah'
        ]);
        Gejala::create([
            'id' => '13',
            'nama_gejala' => 'penyemprotan pestisida tidak tepat'
        ]);
        Gejala::create([
            'id' => '14',
            'nama_gejala' => 'umur tanaman / panen lebih panjang (panen tertunda)'
        ]);
        Gejala::create([
            'id' => '15',
            'nama_gejala' => 'fase pematangan terlambat bisa sampai 7-10 hari'
        ]);
        Gejala::create([
            'id' => '16',
            'nama_gejala' => 'tanaman yang terserang dapat sembuh kembali sehingga tidak terjadi kehilangan hasil'
        ]);
        Gejala::create([
            'id' => '17',
            'nama_gejala' => 'terjadi kehilangan hasil yang bahkan bisa mencapai 30%'
        ]);
        Gejala::create([
            'id' => '18',
            'nama_gejala' => 'pembungaan terlambat atau tidak rata'
        ]);
        Gejala::create([
            'id' => '19',
            'nama_gejala' => 'tunas menguning'
        ]);
        Gejala::create([
            'id' => '20',
            'nama_gejala' => 'di pematang sawah ada lubang yang cukup besar'
        ]);
        Gejala::create([
            'id' => '21',
            'nama_gejala' => 'tercium aroma bau busuk dari tanaman'
        ]);
        Gejala::create([
            'id' => '22',
            'nama_gejala' => 'terdapat ngengat berwarna coklat dengan lebar sayap 2-3 cm'
        ]);
        Gejala::create([
            'id' => '23',
            'nama_gejala' => 'terdapat ngengat berukuran besar dan memiliki bercak seperti bentuk mata pada sayapnya'
        ]);
        Gejala::create([
            'id' => '24',
            'nama_gejala' => 'terdapat ngengat yang tidak tertarik pada cahaya'
        ]);
        Gejala::create([
            'id' => '25',
            'nama_gejala' => 'terdapat ngengat yang aktif pada malam hari'
        ]);
        Gejala::create([
            'id' => '26',
            'nama_gejala' => 'terdapat ngengat yang berukuran kecil'
        ]);
        Gejala::create([
            'id' => '27',
            'nama_gejala' => 'terdapat ngengat berwarna kuning coklat yang saat istirahat membentuk segitiga'
        ]);
        Gejala::create([
            'id' => '28',
            'nama_gejala' => 'terdapat ngengat berwarna putih dan ada titik hitam di sayap'
        ]);
        Gejala::create([
            'id' => '29',
            'nama_gejala' => 'terdapat serangga  yang saat diganggu mengeluarkan bau'
        ]);
        Gejala::create([
            'id' => '30',
            'nama_gejala' => 'terdapat serangga yang suka berada di bulir padi'
        ]);
        Gejala::create([
            'id' => '31',
            'nama_gejala' => 'terdapat serangga seperti nyamuk kecil yg aktif malam hari'
        ]);
        Gejala::create([
            'id' => '32',
            'nama_gejala' => 'terdapat serangga yang penyebarannya hanya lokal saja (hanya di satu area kecil)'
        ]);
        Gejala::create([
            'id' => '33',
            'nama_gejala' => 'terdapat tikus di sawah'
        ]);
        Gejala::create([
            'id' => '34',
            'nama_gejala' => 'terdapat jejak kaki binatang kecil dengan 4 jari dan 5 jari'
        ]);
        Gejala::create([
            'id' => '35',
            'nama_gejala' => 'terdapat keong di sawah'
        ]);
        Gejala::create([
            'id' => '36',
            'nama_gejala' => 'sering terlihat burung pipit di sawah'
        ]);
        Gejala::create([
            'id' => '37',
            'nama_gejala' => 'terdapat orong-orong pada padi'
        ]);
        Gejala::create([
            'id' => '38',
            'nama_gejala' => 'terdapat wereng hijau pada padi'
        ]);
        Gejala::create([
            'id' => '39',
            'nama_gejala' => 'terdapat wereng coklat pada padi'
        ]);
        Gejala::create([
            'id' => '40',
            'nama_gejala' => 'terdapat kepinding tanah pada padi'
        ]);
        Gejala::create([
            'id' => '41',
            'nama_gejala' => 'terdapat larva di dalam tunas atau batang'
        ]);
        Gejala::create([
            'id' => '42',
            'nama_gejala' => 'terdapat larva yang di punggungnya terdapat garis'
        ]);
        Gejala::create([
            'id' => '43',
            'nama_gejala' => 'terdapat larva / ulat yang memiliki 2 pasang tanduk (sepasang diujung kepala dan sepasang di ujung abdomen)'
        ]);
        Gejala::create([
            'id' => '44',
            'nama_gejala' => 'terdapat larva / ulat yang bergerak seperti ulat jengkal dengan cara melengkungkan bagian belakang tubuhnya'
        ]);
        Gejala::create([
            'id' => '45',
            'nama_gejala' => 'terdapat ulat yang berwarna hijau keputihan'
        ]);
        Gejala::create([
            'id' => '46',
            'nama_gejala' => 'terdapat ulat / larva yang berwarna kuning kehijau-hijauan dan tembus cahaya'
        ]);
        Gejala::create([
            'id' => '47',
            'nama_gejala' => 'terdapat ulat / larva yang berada di bagian tengah daun yang masih menggulung'
        ]);
        Gejala::create([
            'id' => '48',
            'nama_gejala' => 'terdapat ulat / larva yang memanjat batang padi membawa gulungan daunnya yang berisi air'
        ]);
        Gejala::create([
            'id' => '49',
            'nama_gejala' => 'terdapat ulat / larva yang saat siang hari berlindung di tanah atau pangkal batang'
        ]);
        Gejala::create([
            'id' => '50',
            'nama_gejala' => 'terdapat larva namun pada fase pembentukan bakal malai tidak lagi merusak'
        ]);
        Gejala::create([
            'id' => '51',
            'nama_gejala' => 'terdapat ulat di lipatan daun'
        ]);
        Gejala::create([
            'id' => '52',
            'nama_gejala' => 'terdapat larva yang membungkus dirinya dari potongan daun yang dibuat menyerupai tabung'
        ]);
        Gejala::create([
            'id' => '53',
            'nama_gejala' => 'terdapat gulungan daun yang berisi larva yang mengapung di atas permukaan air pada siang hari'
        ]);
        Gejala::create([
            'id' => '54',
            'nama_gejala' => 'terdapat larva yang memakan jaringan hijau daun dari dalam lipatan daun dan meninggalkan permukaan bawah daun berwarna putih'
        ]);
        Gejala::create([
            'id' => '55',
            'nama_gejala' => 'terdapat larva muda yang memarut jaringan epidermis tanaman sehingga lapisan bawah daun berwarna putih'
        ]);
        Gejala::create([
            'id' => '56',
            'nama_gejala' => 'terdapat larva yang merusak jaringan bagian dalam dari bagian tengah tanaman sampai titik tumbuh daun'
        ]);
        Gejala::create([
            'id' => '57',
            'nama_gejala' => 'terdapat larva yang memakan daun dimulai dari bagian pinggir daun'
        ]);
        Gejala::create([
            'id' => '58',
            'nama_gejala' => 'terdapat larva yang memakan daun dimulai dari bagian tengah daun'
        ]);
        Gejala::create([
            'id' => '59',
            'nama_gejala' => 'terdapat cendawan yang menembus batang padi yang membuatnya lemah'
        ]);
        Gejala::create([
            'id' => '60',
            'nama_gejala' => 'terjadi perubahan warna pada daun dimulai dari ujung daun'
        ]);
        Gejala::create([
            'id' => '61',
            'nama_gejala' => 'perubahan warna daun terjadi terutama pada daun muda'
        ]);
        Gejala::create([
            'id' => '62',
            'nama_gejala' => 'seluruh daun berubah warna menjadi coklat'
        ]);
        Gejala::create([
            'id' => '63',
            'nama_gejala' => 'daun mengalami perubahan warna dari hijau menjadi sedikit kuning sampai kuning orange dan kuning coklat'
        ]);
        Gejala::create([
            'id' => '64',
            'nama_gejala' => 'helai daun yang rusak berubah warna menjadi kuning atau kuning kecoklat-coklatan'
        ]);
        Gejala::create([
            'id' => '65',
            'nama_gejala' => 'bagian pinggir dan ujung daun tua seperti terbakar (daun berubah warna menjadi kekuningan / orange sampai kecoklatan yang dimulai dari ujung daun terus menjalar ke pangkal daun)'
        ]);
        Gejala::create([
            'id' => '66',
            'nama_gejala' => 'lama-kelamaan daun menjadi berwarna keungu-unguan'
        ]);
        Gejala::create([
            'id' => '67',
            'nama_gejala' => 'ujung daun menekuk'
        ]);
        Gejala::create([
            'id' => '68',
            'nama_gejala' => 'ukuran daun lebih kecil dibandingkan daun tanaman sehat'
        ]);
        Gejala::create([
            'id' => '69',
            'nama_gejala' => 'daun menguning'
        ]);
        Gejala::create([
            'id' => '70',
            'nama_gejala' => 'daun mati'
        ]);
        Gejala::create([
            'id' => '71',
            'nama_gejala' => 'daun mengering'
        ]);
        Gejala::create([
            'id' => '72',
            'nama_gejala' => 'ada daun yang menggulung'
        ]);
        Gejala::create([
            'id' => '73',
            'nama_gejala' => 'daun menggulung secara  membujur'
        ]);
        Gejala::create([
            'id' => '74',
            'nama_gejala' => 'daun menggulung seperti daun bawang'
        ]);
        Gejala::create([
            'id' => '75',
            'nama_gejala' => 'anakan yg memiliki gejala daun bawang tidak menghasilkan malai'
        ]);
        Gejala::create([
            'id' => '76',
            'nama_gejala' => 'tanaman yang daunnya seperti daun bawang tidak menghasilkan bulir'
        ]);
        Gejala::create([
            'id' => '77',
            'nama_gejala' => 'terdapat lubang di pucuk daun bawang'
        ]);
        Gejala::create([
            'id' => '78',
            'nama_gejala' => 'ukuran daun yang menggulung bisa panjang, kecil, ataupun pendek'
        ]);
        Gejala::create([
            'id' => '79',
            'nama_gejala' => 'banyak daun yang melintir'
        ]);
        Gejala::create([
            'id' => '80',
            'nama_gejala' => 'daun tanaman padi menjadi sempit, pendek, dan kaku'
        ]);
        Gejala::create([
            'id' => '81',
            'nama_gejala' => 'daun berwarna hijau pucat sampai hijau, dan terdapat bercak karat'
        ]);
        Gejala::create([
            'id' => '82',
            'nama_gejala' => 'pada bagian bawah daun tua berwarna hijau kekuning-kuningan hingga kuning'
        ]);
        Gejala::create([
            'id' => '83',
            'nama_gejala' => 'bagian pinggir daun tidak rata atau pecah-pecah'
        ]);
        Gejala::create([
            'id' => '84',
            'nama_gejala' => 'daun bendera melintir, berubah bentuk, dan memendek pada fase bunting'
        ]);
        Gejala::create([
            'id' => '85',
            'nama_gejala' => 'daun berwarna hijau gelap dan tegak'
        ]);
        Gejala::create([
            'id' => '86',
            'nama_gejala' => 'daun layu / terkulai'
        ]);
        Gejala::create([
            'id' => '87',
            'nama_gejala' => 'daun terpotong seperti digunting'
        ]);
        Gejala::create([
            'id' => '88',
            'nama_gejala' => 'daun dimakan mulai dari bagian tepi sampai hanya meninggalkan tulang daun dan batang'
        ]);
        Gejala::create([
            'id' => '89',
            'nama_gejala' => 'bekas potongan daun dan batang terlihat mengambang'
        ]);
        Gejala::create([
            'id' => '90',
            'nama_gejala' => 'daun mengalami perubahan bentuk'
        ]);
        Gejala::create([
            'id' => '91',
            'nama_gejala' => 'terdapat warna putih pada daun'
        ]);
        Gejala::create([
            'id' => '92',
            'nama_gejala' => 'terdapat bekas gigitan 180 derajat pada daun dan batang'
        ]);
        Gejala::create([
            'id' => '93',
            'nama_gejala' => 'malai hampa (beluk)'
        ]);
        Gejala::create([
            'id' => '94',
            'nama_gejala' => 'hanya sedikit malai yang berisi'
        ]);
        Gejala::create([
            'id' => '95',
            'nama_gejala' => 'malai hanya muncul sebagian (tidak berkembang)'
        ]);
        Gejala::create([
            'id' => '96',
            'nama_gejala' => 'malai yang muncul hanya dapat menghasilkan sedikit bulir yang berisi'
        ]);
        Gejala::create([
            'id' => '97',
            'nama_gejala' => 'malai mengerut'
        ]);
        Gejala::create([
            'id' => '98',
            'nama_gejala' => 'malai menjadi kecil'
        ]);
        Gejala::create([
            'id' => '99',
            'nama_gejala' => 'padi tidak memproduksi malai'
        ]);
        Gejala::create([
            'id' => '100',
            'nama_gejala' => 'leher malai berubah menjadi kehitam-hitaman dan patah'
        ]);
        Gejala::create([
            'id' => '101',
            'nama_gejala' => 'anakan kerdil'
        ]);
        Gejala::create([
            'id' => '102',
            'nama_gejala' => 'anakan mati'
        ]);
        Gejala::create([
            'id' => '103',
            'nama_gejala' => 'jumlah anakan sedikit'
        ]);
        Gejala::create([
            'id' => '104',
            'nama_gejala' => 'jumlah anakan berkurang'
        ]);
        Gejala::create([
            'id' => '105',
            'nama_gejala' => 'jumlah anakan lebih banyak daripada tanamaan sehat'
        ]);
        Gejala::create([
            'id' => '106',
            'nama_gejala' => 'jumlah anakan berlebihan sehingga tampak seperti rumput'
        ]);
        Gejala::create([
            'id' => '107',
            'nama_gejala' => 'terdapat bercak kuning yang berkembang menjadi berwarna abu-abu atau putih pada bagian tengahnya'
        ]);
        Gejala::create([
            'id' => '108',
            'nama_gejala' => 'terdapat bercak-bercak kuning yang dapat dilihat di sepanjang tepi daun yang baru muncul'
        ]);
        Gejala::create([
            'id' => '109',
            'nama_gejala' => 'terdapat bercak berwarna kuning sampai putih berawal dari terbentuknya garis lebam berair pada bagian tepi daun'
        ]);
        Gejala::create([
            'id' => '110',
            'nama_gejala' => 'bercak secara bertahap membesar'
        ]);
        Gejala::create([
            'id' => '111',
            'nama_gejala' => 'terdapat bercak sempit berwarna hijau gelap yang lama kelamaan membesar berwarna kuning dan tembus cahaya di antara pembuluh daun'
        ]);
        Gejala::create([
            'id' => '112',
            'nama_gejala' => 'bercak berubah menjadi berwarna coklat dan berkembang menyamping melampaui pembuluh daun yang besar'
        ]);
        Gejala::create([
            'id' => '113',
            'nama_gejala' => 'bercak dimulai dari salah satu atau kedua tepi daun yang rusak, lalu berkembang hingga menutupi seluruh helai daun'
        ]);
        Gejala::create([
            'id' => '114',
            'nama_gejala' => 'bercak dapat membesar mencapai pangkal daun terus ke pelepah daun'
        ]);
        Gejala::create([
            'id' => '115',
            'nama_gejala' => 'bercak membesar, sering bersambung, dan bisa menutupi seluruh pelepah daun'
        ]);
        Gejala::create([
            'id' => '116',
            'nama_gejala' => 'bercak lama-kelamaan menghitam dan membesar'
        ]);
        Gejala::create([
            'id' => '117',
            'nama_gejala' => 'gejala awal berupa bercak berwarna hijau kuning terang yang berkembang menuju ujung daun'
        ]);
        Gejala::create([
            'id' => '118',
            'nama_gejala' => 'bercak diawali titik hitam di pelepah, lama-lama membesar menjadi bercak abu-abu yang pinggirnya hitam'
        ]);
        Gejala::create([
            'id' => '119',
            'nama_gejala' => 'bercak hanya muncul di daun'
        ]);
        Gejala::create([
            'id' => '120',
            'nama_gejala' => 'bercak bisa muncul di daun, pelepah, dan pangkal malai'
        ]);
        Gejala::create([
            'id' => '121',
            'nama_gejala' => 'terdapat bercak berbentuk belah ketupat yang lebar di tengah dan meruncing di kedua ujungnya'
        ]);
        Gejala::create([
            'id' => '122',
            'nama_gejala' => 'bercak berbentuk acak (tidak beraturan)'
        ]);
        Gejala::create([
            'id' => '123',
            'nama_gejala' => 'bercak pada daun seperti garis yang memanjang'
        ]);
        Gejala::create([
            'id' => '124',
            'nama_gejala' => 'bercak bergaris pada daun bisa banyak jumlahnya'
        ]);
        Gejala::create([
            'id' => '125',
            'nama_gejala' => 'bercak muncul dimulai dari daun muda'
        ]);
        Gejala::create([
            'id' => '126',
            'nama_gejala' => 'bercak muncul dari daun tua lalu seluruh tanaman (baru ke daun muda)'
        ]);
        Gejala::create([
            'id' => '127',
            'nama_gejala' => 'bercak berukuran kira-kira 1-1,5 x 0,3-0,5 cm'
        ]);
        Gejala::create([
            'id' => '128',
            'nama_gejala' => 'bercak sering sulit dibedakan dengan gejala bercak coklat Helminthosporium'
        ]);
        Gejala::create([
            'id' => '129',
            'nama_gejala' => 'bercak terjadi juga pada ruas batang dan leher malai'
        ]);
        Gejala::create([
            'id' => '130',
            'nama_gejala' => 'di antara permukaan air dan daun terdapat bercak keabu-abuan yang berbentuk oval memanjang atau berbentuk elips'
        ]);
        Gejala::create([
            'id' => '131',
            'nama_gejala' => 'terdapat bercak berwarna kehitam-hitaman di batang, daunnya normal'
        ]);
        Gejala::create([
            'id' => '132',
            'nama_gejala' => 'bentuk bercak tidak teratur pada sisi luar pelepah daun'
        ]);
        Gejala::create([
            'id' => '133',
            'nama_gejala' => 'terjadi infeksi (terdapat noda) pada pelepah daun paling atas yang menutupi malai muda pada akhir fase bunting'
        ]);
        Gejala::create([
            'id' => '134',
            'nama_gejala' => 'terdapat noda berbentuk bulat memanjang hingga tidak teratur dengan panjang 0,5-1,5 cm, warna abu-abu di tengahnya, dan coklat atau coklat abu-abu di pinggirnya'
        ]);
        Gejala::create([
            'id' => '135',
            'nama_gejala' => 'terdapat bercak oval di pelepah daun bendera (daun paling atas, di bawah malai)'
        ]);
        Gejala::create([
            'id' => '136',
            'nama_gejala' => 'gejala awal (bercak) dapat ditemukan pada daun dan pelepah daun'
        ]);
        Gejala::create([
            'id' => '137',
            'nama_gejala' => 'gejala (bercak) mulai terlihat sejak pertanaman padi memasuki fase generatif'
        ]);
        Gejala::create([
            'id' => '138',
            'nama_gejala' => 'gejala (bercak) dapat juga dilihat pada stadia tanaman mulai berbunga sampai pemasakan'
        ]);
        Gejala::create([
            'id' => '139',
            'nama_gejala' => 'terdapaat bercak berbentuk oval memanjang atau berbentuk elips yang berwarna jingga'
        ]);
        Gejala::create([
            'id' => '140',
            'nama_gejala' => 'terdapat bercak coklat gelap yang menutupi bulir-bulir'
        ]);
        Gejala::create([
            'id' => '141',
            'nama_gejala' => 'terdapat embun jelaga'
        ]);
        Gejala::create([
            'id' => '142',
            'nama_gejala' => 'terjadi saat kemarau'
        ]);
        Gejala::create([
            'id' => '143',
            'nama_gejala' => 'terjadi pada tanaman padi yang sudah dalam fase matang susu sampai pemasakan biji'
        ]);
        Gejala::create([
            'id' => '144',
            'nama_gejala' => 'kerusakan terjadi pada jam 6-10 pagi jam 2-6 sore'
        ]);
        Gejala::create([
            'id' => '145',
            'nama_gejala' => 'terjadi pada tanaman padi di setiap fase pertumbuhan'
        ]);
        Gejala::create([
            'id' => '146',
            'nama_gejala' => 'terjadi saat cuaca lembab terutama musim hujan'
        ]);
        Gejala::create([
            'id' => '147',
            'nama_gejala' => 'terjadi pada suhu udara tinggi'
        ]);
        Gejala::create([
            'id' => '148',
            'nama_gejala' => 'terjadi saat sawah kering'
        ]);
        Gejala::create([
            'id' => '149',
            'nama_gejala' => 'terjadi pada tanaman padi yang baru ditanam pindah pada sawah yang terlalu tergenang'
        ]);
        Gejala::create([
            'id' => '150',
            'nama_gejala' => 'kerusakan terjadi pada tanaman muda saja'
        ]);
        Gejala::create([
            'id' => '151',
            'nama_gejala' => 'kerusakan terjadi pada malam hari'
        ]);
        Gejala::create([
            'id' => '152',
            'nama_gejala' => 'kerusakan terjadi saat cuaca berawan'
        ]);
        Gejala::create([
            'id' => '153',
            'nama_gejala' => 'bobot bulir tanaman yang terinfeksi lebih ringan daripada bulir tanaman sehat sehingga mengakibatkan hasil rendah'
        ]);
        Gejala::create([
            'id' => '154',
            'nama_gejala' => 'ada bekas gigitan dibulir yang meninggalkan titik hitam'
        ]);
        Gejala::create([
            'id' => '155',
            'nama_gejala' => 'beras berubah warna menjadi hitam'
        ]);
        Gejala::create([
            'id' => '156',
            'nama_gejala' => 'proses pemasakan lebih cepat sehingga kebernasan berkurang (ada yang isi dan ada yang tidak)'
        ]);
        Gejala::create([
            'id' => '157',
            'nama_gejala' => 'gabah yang terbentuk berkurang'
        ]);
        Gejala::create([
            'id' => '158',
            'nama_gejala' => 'ukuran dan berat gabah berkurang?'
        ]);
        Gejala::create([
            'id' => '159',
            'nama_gejala' => 'bulir banyak yang hilang'
        ]);
        Gejala::create([
            'id' => '160',
            'nama_gejala' => 'ada bekas hisapan wereng'
        ]);
        Gejala::create([
            'id' => '161',
            'nama_gejala' => 'daerah sekitar lubang bekas hisapan berubah warna jadi coklat'
        ]);
        Gejala::create([
            'id' => '162',
            'nama_gejala' => 'terdapat bekas bergaris di daun yang merupakan bekas hisapan lalat'
        ]);
        Gejala::create([
            'id' => '163',
            'nama_gejala' => 'batang tanaman rusak terpotong'
        ]);
        Gejala::create([
            'id' => '164',
            'nama_gejala' => 'pada pangkal batang tanaman terpotong'
        ]);
        Gejala::create([
            'id' => '165',
            'nama_gejala' => 'ujung batang menguning'
        ]);
        Gejala::create([
            'id' => '166',
            'nama_gejala' => 'terdapat bekas gigitan 45 derajat pada pangkal batang yang terpotong'
        ]);
        Gejala::create([
            'id' => '167',
            'nama_gejala' => 'terdapat lubang bekas ulat masuk pada batang atau tunas'
        ]);
        Gejala::create([
            'id' => '168',
            'nama_gejala' => 'kerusakan terjadi pada batang yang dekat dengan permukaan air'
        ]);
        Gejala::create([
            'id' => '169',
            'nama_gejala' => 'terdapat kelompok telur yang diselimuti bulu berwarna putih'
        ]);
        Gejala::create([
            'id' => '170',
            'nama_gejala' => 'terdapat telur yang sejajar dengan tulang daun di belakang daun'
        ]);
        Gejala::create([
            'id' => '171',
            'nama_gejala' => 'terdapat telur berwarna keputih-putihan dan berbentuk lonjong seperti pisang yang diletakkan pada permukaan atas daun'
        ]);
        Gejala::create([
            'id' => '172',
            'nama_gejala' => 'terdapat kelompok telur berwarna merah muda'
        ]);
        Gejala::create([
            'id' => '173',
            'nama_gejala' => 'terdapat bibit yang hilang'
        ]);
        Gejala::create([
            'id' => '174',
            'nama_gejala' => 'bibit menjadi kering'
        ]);
        Gejala::create([
            'id' => '175',
            'nama_gejala' => 'benih yang disebar saat pembibitan hilang atau rusak dimakan'
        ]);
        Gejala::create([
            'id' => '176',
            'nama_gejala' => 'sebagian akarnya membusuk'
        ]);
        Gejala::create([
            'id' => '177',
            'nama_gejala' => 'akar muda dan bagian pangkal tanaman yang berada di bawah tanah rusak'
        ]);
        Gejala::create([
            'id' => '178',
            'nama_gejala' => 'pertumbuhan akar tanaman lambat'
        ]);
        Gejala::create([
            'id' => '179',
            'nama_gejala' => 'tanaman dipupuk nitrogen tinggi'
        ]);
        Gejala::create([
            'id' => '180',
            'nama_gejala' => 'tanaman padi dipupuk dengan takaran tinggi'
        ]);
        Gejala::create([
            'id' => '181',
            'nama_gejala' => 'sawah merupakan lahan pasang surut'
        ]);
        Gejala::create([
            'id' => '182',
            'nama_gejala' => 'lahan sawah kering tidak digenangi'
        ]);
        Gejala::create([
            'id' => '183',
            'nama_gejala' => 'lahan sawah digenangi air'
        ]);
        Gejala::create([
            'id' => '184',
            'nama_gejala' => 'kerusakan hanya di spot-spot tertentu'
        ]);
        Gejala::create([
            'id' => '185',
            'nama_gejala' => 'kerusakan terjadi di 1 hamparan padi (full tidak hanya di spot-spot tertentu)'
        ]);

        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '1',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '1',
            'gejala_id' => '2',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '1',
            'gejala_id' => '19',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '1',
            'gejala_id' => '28',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '1',
            'gejala_id' => '41',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '1',
            'gejala_id' => '93',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '1',
            'gejala_id' => '101',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '1',
            'gejala_id' => '102',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '1',
            'gejala_id' => '165',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '1',
            'gejala_id' => '167',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '1',
            'gejala_id' => '169',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '2',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '2',
            'gejala_id' => '2',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '2',
            'gejala_id' => '3',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '2',
            'gejala_id' => '4',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '2',
            'gejala_id' => '6',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '2',
            'gejala_id' => '10',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '2',
            'gejala_id' => '13',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '2',
            'gejala_id' => '39',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '2',
            'gejala_id' => '69',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '2',
            'gejala_id' => '104',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '2',
            'gejala_id' => '141',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '2',
            'gejala_id' => '160',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '2',
            'gejala_id' => '179',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '2',
            'gejala_id' => '184',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '3',
            'gejala_id' => '1',
            'nilai_pakar' => '0.6'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '3',
            'gejala_id' => '2',
            'nilai_pakar' => '0.6'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '3',
            'gejala_id' => '40',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '3',
            'gejala_id' => '71',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '3',
            'gejala_id' => '73',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '3',
            'gejala_id' => '93',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '3',
            'gejala_id' => '101',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '3',
            'gejala_id' => '102',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '3',
            'gejala_id' => '142',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '3',
            'gejala_id' => '148',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '3',
            'gejala_id' => '161',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '3',
            'gejala_id' => '185',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '4',
            'gejala_id' => '2',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '4',
            'gejala_id' => '29',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '4',
            'gejala_id' => '30',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '4',
            'gejala_id' => '93',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '4',
            'gejala_id' => '154',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '4',
            'gejala_id' => '155',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '5',
            'gejala_id' => '1',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '5',
            'gejala_id' => '2',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '5',
            'gejala_id' => '20',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '5',
            'gejala_id' => '33',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '5',
            'gejala_id' => '34',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '5',
            'gejala_id' => '151',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '5',
            'gejala_id' => '163',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '5',
            'gejala_id' => '164',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '5',
            'gejala_id' => '166',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '5',
            'gejala_id' => '179',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '6',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '6',
            'gejala_id' => '2',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '6',
            'gejala_id' => '31',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '6',
            'gejala_id' => '32',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '6',
            'gejala_id' => '50',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '6',
            'gejala_id' => '72',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '6',
            'gejala_id' => '74',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '6',
            'gejala_id' => '75',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '6',
            'gejala_id' => '76',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '6',
            'gejala_id' => '77',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '6',
            'gejala_id' => '78',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '7',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '7',
            'gejala_id' => '2',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '7',
            'gejala_id' => '27',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '7',
            'gejala_id' => '51',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '7',
            'gejala_id' => '54',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '7',
            'gejala_id' => '58',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '7',
            'gejala_id' => '72',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '7',
            'gejala_id' => '91',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '7',
            'gejala_id' => '170',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '8',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '8',
            'gejala_id' => '26',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '8',
            'gejala_id' => '48',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '8',
            'gejala_id' => '52',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '8',
            'gejala_id' => '53',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '8',
            'gejala_id' => '87',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '9',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '9',
            'gejala_id' => '2',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '9',
            'gejala_id' => '25',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '9',
            'gejala_id' => '42',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '9',
            'gejala_id' => '49',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '9',
            'gejala_id' => '88',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '9',
            'gejala_id' => '142',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '9',
            'gejala_id' => '151',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '9',
            'gejala_id' => '152',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '10',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '10',
            'gejala_id' => '2',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '10',
            'gejala_id' => '23',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '10',
            'gejala_id' => '24',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '10',
            'gejala_id' => '43',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '10',
            'gejala_id' => '57',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '11',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '11',
            'gejala_id' => '2',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '11',
            'gejala_id' => '16',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '11',
            'gejala_id' => '22',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '11',
            'gejala_id' => '25',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '11',
            'gejala_id' => '44',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '11',
            'gejala_id' => '45',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '11',
            'gejala_id' => '55',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '11',
            'gejala_id' => '57',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '11',
            'gejala_id' => '91',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '11',
            'gejala_id' => '179',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '12',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '12',
            'gejala_id' => '6',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '12',
            'gejala_id' => '37',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '12',
            'gejala_id' => '69',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '12',
            'gejala_id' => '70',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '12',
            'gejala_id' => '164',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '12',
            'gejala_id' => '175',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '12',
            'gejala_id' => '177',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '12',
            'gejala_id' => '181',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '12',
            'gejala_id' => '182',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '12',
            'gejala_id' => '184',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '13',
            'gejala_id' => '1',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '13',
            'gejala_id' => '9',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '13',
            'gejala_id' => '15',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '13',
            'gejala_id' => '46',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '13',
            'gejala_id' => '47',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '13',
            'gejala_id' => '56',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '13',
            'gejala_id' => '69',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '13',
            'gejala_id' => '104',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '13',
            'gejala_id' => '108',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '13',
            'gejala_id' => '162',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '13',
            'gejala_id' => '171',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '13',
            'gejala_id' => '183',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '14',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '14',
            'gejala_id' => '9',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '14',
            'gejala_id' => '35',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '14',
            'gejala_id' => '89',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '14',
            'gejala_id' => '92',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '14',
            'gejala_id' => '163',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '14',
            'gejala_id' => '172',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '14',
            'gejala_id' => '173',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '14',
            'gejala_id' => '183',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '15',
            'gejala_id' => '2',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '15',
            'gejala_id' => '36',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '15',
            'gejala_id' => '143',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '15',
            'gejala_id' => '144',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '15',
            'gejala_id' => '159',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '16',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '16',
            'gejala_id' => '2',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '16',
            'gejala_id' => '10',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '16',
            'gejala_id' => '60',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '16',
            'gejala_id' => '67',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '16',
            'gejala_id' => '69',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '16',
            'gejala_id' => '71',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '16',
            'gejala_id' => '109',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '16',
            'gejala_id' => '110',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '16',
            'gejala_id' => '113',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '16',
            'gejala_id' => '114',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '16',
            'gejala_id' => '116',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '16',
            'gejala_id' => '119',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '16',
            'gejala_id' => '122',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '16',
            'gejala_id' => '126',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '16',
            'gejala_id' => '174',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '17',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '17',
            'gejala_id' => '2',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '17',
            'gejala_id' => '11',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '17',
            'gejala_id' => '17',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '17',
            'gejala_id' => '62',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '17',
            'gejala_id' => '70',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '17',
            'gejala_id' => '110',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '17',
            'gejala_id' => '111',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '17',
            'gejala_id' => '112',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '17',
            'gejala_id' => '119',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '17',
            'gejala_id' => '123',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '17',
            'gejala_id' => '124',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '2',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '70',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '93',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '94',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '100',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '107',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '120',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '121',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '125',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '126',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '127',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '128',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '129',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '145',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '146',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '18',
            'gejala_id' => '179',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '19',
            'gejala_id' => '1',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '19',
            'gejala_id' => '2',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '19',
            'gejala_id' => '6',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '19',
            'gejala_id' => '118',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '19',
            'gejala_id' => '120',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '19',
            'gejala_id' => '130',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '19',
            'gejala_id' => '136',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '19',
            'gejala_id' => '146',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '19',
            'gejala_id' => '147',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '19',
            'gejala_id' => '179',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '20',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '20',
            'gejala_id' => '2',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '20',
            'gejala_id' => '12',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '20',
            'gejala_id' => '21',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '20',
            'gejala_id' => '59',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '20',
            'gejala_id' => '102',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '20',
            'gejala_id' => '110',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '20',
            'gejala_id' => '131',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '20',
            'gejala_id' => '132',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '20',
            'gejala_id' => '168',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '21',
            'gejala_id' => '2',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '21',
            'gejala_id' => '6',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '21',
            'gejala_id' => '10',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '21',
            'gejala_id' => '95',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '21',
            'gejala_id' => '96',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '21',
            'gejala_id' => '97',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '21',
            'gejala_id' => '115',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '21',
            'gejala_id' => '133',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '21',
            'gejala_id' => '134',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '21',
            'gejala_id' => '135',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '2',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '10',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '60',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '67',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '69',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '71',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '110',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '113',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '114',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '117',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '119',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '122',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '126',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '136',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '137',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '22',
            'gejala_id' => '138',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '23',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '23',
            'gejala_id' => '2',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '23',
            'gejala_id' => '3',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '23',
            'gejala_id' => '7',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '23',
            'gejala_id' => '14',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '23',
            'gejala_id' => '18',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '23',
            'gejala_id' => '38',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '23',
            'gejala_id' => '60',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '23',
            'gejala_id' => '61',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '23',
            'gejala_id' => '63',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '23',
            'gejala_id' => '79',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '23',
            'gejala_id' => '93',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '23',
            'gejala_id' => '98',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '23',
            'gejala_id' => '103',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '23',
            'gejala_id' => '140',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '23',
            'gejala_id' => '153',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '24',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '24',
            'gejala_id' => '2',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '24',
            'gejala_id' => '3',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '24',
            'gejala_id' => '7',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '24',
            'gejala_id' => '38',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '24',
            'gejala_id' => '39',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '24',
            'gejala_id' => '80',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '24',
            'gejala_id' => '81',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '24',
            'gejala_id' => '99',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '24',
            'gejala_id' => '106',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '25',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '25',
            'gejala_id' => '2',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '25',
            'gejala_id' => '3',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '25',
            'gejala_id' => '8',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '25',
            'gejala_id' => '38',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '25',
            'gejala_id' => '39',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '25',
            'gejala_id' => '64',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '25',
            'gejala_id' => '72',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '25',
            'gejala_id' => '83',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '25',
            'gejala_id' => '84',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '25',
            'gejala_id' => '93',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '25',
            'gejala_id' => '105',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '26',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '26',
            'gejala_id' => '3',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '26',
            'gejala_id' => '4',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '26',
            'gejala_id' => '5',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '26',
            'gejala_id' => '18',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '26',
            'gejala_id' => '68',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '26',
            'gejala_id' => '82',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '26',
            'gejala_id' => '104',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '26',
            'gejala_id' => '156',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '26',
            'gejala_id' => '157',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '27',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '27',
            'gejala_id' => '3',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '27',
            'gejala_id' => '14',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '27',
            'gejala_id' => '18',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '27',
            'gejala_id' => '66',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '27',
            'gejala_id' => '85',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '27',
            'gejala_id' => '103',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '27',
            'gejala_id' => '157',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '27',
            'gejala_id' => '178',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '28',
            'gejala_id' => '1',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '28',
            'gejala_id' => '3',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '28',
            'gejala_id' => '65',
            'nilai_pakar' => '0.8'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '28',
            'gejala_id' => '86',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '28',
            'gejala_id' => '104',
            'nilai_pakar' => '0.4'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '28',
            'gejala_id' => '158',
            'nilai_pakar' => '1'
        ]);
        DB::table('nilai_pakars')->insert([
            'penyakit_id' => '28',
            'gejala_id' => '176',
            'nilai_pakar' => '0.4'
        ]);
    }
}
