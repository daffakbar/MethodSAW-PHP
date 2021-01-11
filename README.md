# Metode SAW (Simple Additive Weighting)
Metode Simple Additive Weighting (SAW) dikenal dengan istilah metode penjumlahan terbobot. Konsep dasar pada metode SAW adalah mencari penjumlahan terbobot dari rating kinerja pada setiap alternatif di semua atribut

## Studi kasus
Menentukan kriteria-kriteria dalam proses seleksi beasiswa
kriteria yang digunakan :

1. C1 = Nilai Index Prestasi Akademik (Benefit)
2. C2 = Penghasilan Orang Tua (Cost)
3. C3 = Semester (Benefit)
4. C4 = Jumlah Tanggungan Orang Tua (Benefit)
5. C5 = Keikutsertaan Organisasi (Benefit)

Bobot Kriteria
| Kriteria  | Bobot  |
| :------------ |---------------:| 
| C1. | 0,3 | 
| C2. | 0,25 | 
| C3. | 0,1 | 
| C4. | 0,3 | 
| C5. | 0,05 | 
| TOTAL. | 1 | 

---
dari kriteria tersebut akan digunakan variable. dimana setiap variabel akan diberi bobot dalam bentuk angka dengan range 1 - 10
#### Kriteria IPK
| No.  | IPK  | Nilai |
| :------------ |:---------------:| -----:|
| 1. | IPK < 2,50 | 2,5 |
| 2. | 2,50 <= IPK <= 3,00  | 5 |
| 3. | 3,00 < IPK <= 3,50  | 7,5 |
| 4. |  IPK > 3,50  | 10 |

#### Kriteria penghasilan orang tua
| No.  | Penghasilan orang tua  | Nilai |
| :------------ |:---------------:| -----:|
| 1. | X <= Rp 1.000.000 | 2,5 |
| 2. | Rp 1.000.000 < X <= Rp 3.000.000 | 5 |
| 3. | Rp 3.000.000 < X < Rp 5.000.000 | 7,5 |
| 4. | X >= Rp 5.000.000 | 2,5 |

#### Kriteria jumlah tanggungan orang tua
| No.  | Jumlah tanggungan orang tua  | Nilai |
| :------------ |:---------------:| -----:|
| 1. | 1 anak | 0 |
| 2. | 2 anak | 2,5 |
| 3. | 3 anak | 5 |
| 4. | 4 anak | 7,5 |
| 5. | 5 anak | 10 |

#### Kriteria semester
| No.  | Semester  | Nilai |
| :------------ |:---------------:| -----:|
| 1. | Semester 2 | 0 |
| 2. | Semester 3 | 2 |
| 3. | Semester 4 | 4 |
| 4. | Semester 5 | 6 |
| 5. | Semester 6 | 8 |
| 6. | Semester 7 | 10 |

#### Kriteria Keikutsertaan organisasi
| No.  | Keikutsertaan organisasi  | Nilai |
| :------------ |:---------------:| -----:|
| 1. | Pasif | 0 |
| 2. | Tingkat (Jurusan) | 2,5 |
| 3. | Tingkat (Fakultas) | 5 |
| 4. | Tingkat (Universitas) | 7,5 |
| 5. | Tingkat (Antar Universitas) | 10 |

---
### Perhitungan
pada studi kasus ini, ada 4 calon mahasiswa yang akan menjadi alternatif, yaitu:
1. Ibrahim
1. Ika
2. Rina
3. Cito

setiap alternatif diberikan variable untuk masing - masing kriteria sesuai keadaan dari alternatif: 
| Alternatif  | C1  | C2 | C3 | C4 | C5
| :------------ |:---------------:|:---------------:|:---------------:| -----:|
| Ibramhim. | 5 | 7.5 |  6 | 2.5 | 5 |
| Ika. | 2.5 | 5 | 4 | 5 | 7.5 |
| Rina. | 7.5 | 5 | 2 | 10 | 10 |
| Dito. | 10 | 2.5 | 8 | 7.5 | 10 |

kemudian dari tabel di atas dilakukan normalisasi sebagai berikut :
1. Benefit
    Rij = Xij / Max(Xij) 
2. Cost
    Rij = Min(Xij) / Xij

Rij = nilai rating ternormalisasi
Max = nilai maksismum dari setiap baris dan kolom
Min = nilai Minimum dari setiap baris dan kolom
Xij = baris dan kolom dari matriks

Contoh: 
Benefit
R11 = 5 / max{5,2.5,7.5,10} 
R11 = 5 / 10
R11 = 0.5

Cost
R21 = Min{7.5,5,5,2.5} / 7.5
R21 = 2.5 / 7.5
R21 = 2.5 / 7.5
R21 = 0.33

Berikut hasilnya :
![picture](img/1.png)

selanjutnya akan dilakukan perhitungan untuk mencari nilai akhir dengan melakukan perkalian bobot kriteria dan matriks R yang telah ternormalisasi

Contoh: 
A1 = C1 x R11 + C2 x R12 + C3 x R13+ C4 x R14 + C5 x R15
A1 = 0.3 x 0.5 + 0.25 x 0.33 + 0.1 x 0.75 + 0.3 x 0.25 + 0.05 x 0.5
A1 = 0,4075

Berikut hasilnya: 
![picture](img/2.png)
jadi berikut adalah hasil perhitungan rekomendasi mahasiswa yangv layak mendapatkan beasiswa :

![picture](img/3.png)