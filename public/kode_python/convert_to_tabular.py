# read_csv.py
import pandas as pd
import sys
import json
from datetime import timedelta

def to_tabular(hari):
    try:
        # membaca csv
        df= pd.read_csv('kode_python/pizza_sales.csv')

        # mengubah order_date menjadi tipe data date
        df['order_date'] = df['order_date'].str.replace('/', '-')
        df['order_date'] = pd.to_datetime(df['order_date'], format='%d-%m-%Y')

        # seleksi kolom yang dibutuhkan
        PilihKolom = df[['order_id', 'order_date','quantity', 'pizza_name']]

        # membuat batas tanggal
        tanggal_indeks = pd.to_datetime('2015-01-01')
        tanggal_akhir = pd.to_datetime('2015-12-31')
        i = 0

        # mengelompokkan data pada interval tanggal tertentu
        while tanggal_indeks <= tanggal_akhir:
            tanggal_baru = tanggal_indeks + timedelta(days=hari)
            
            # Gunakan .loc[] untuk assignment yang benar
            PilihKolom.loc[(PilihKolom['order_date'] >= tanggal_indeks) & 
                        (PilihKolom['order_date'] < tanggal_baru), 'cluster'] = i
            
            # Update tanggal_indeks dan increment nilai i
            tanggal_indeks = tanggal_baru
            i += 1

            # Kelompokkan berdasarkan rentang hari
            grouped = PilihKolom.groupby('cluster')

            # Pisahkan DataFrame berdasarkan rentang hari
            weekly_dataframes = {week: group for week, group in grouped}

        df_list = []
        for i in range(len(weekly_dataframes)):
            # Menghitung jumlah quantity per pizza
            pizza_quantity = weekly_dataframes[i].groupby('pizza_name')['quantity'].sum()

            # Mengurutkan berdasarkan quantity dan mengambil yang teratas
            most_ordered_pizza = pizza_quantity.sort_values(ascending=False).head(3).reset_index()
            most_ordered_pizza['cluster'] = i

            df_list.append(most_ordered_pizza)

        result_df = pd.concat(df_list, ignore_index=True)

        # Menggunakan pivot_table untuk membuat format one-hot encoding
        one_hot = pd.get_dummies(result_df['pizza_name'])

        # Menambahkan kolom Transaksi_ID
        df_one_hot = result_df.join(one_hot)

        df_one_hot.drop(['pizza_name', 'quantity'], axis=1, inplace=True)

        df_pivot = df_one_hot.groupby(['cluster']).sum()

        df_pivot[df_pivot > 1] = 1

        df_pivot.to_csv('kode_python/tabel_tabular.csv')
        print('berhasil')
        
    except Exception as e:
        print(json.dumps({
            "status": "error",
            "message": str(e)
        }))

if __name__ == "__main__":
    if len(sys.argv) > 1:
        hari = int(sys.argv[1])
        to_tabular(hari)
