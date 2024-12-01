# read_csv.py
import pandas as pd
import json
import sys
from datetime import timedelta

def bagi_csv(jumlahHari):
    try:
        # Baca CSV menggunakan pandas
        df = pd.read_csv('pizza_sales.csv')
        df['order_date'] = df['order_date'].str.replace('/', '-')
        df['order_date'] = pd.to_datetime(df['order_date'], format='%d-%m-%Y')
        df = df[['order_id', 'order_date','pizza_size', 'pizza_name']]

        # df_sorted_desc = PilihKolom.sort_values(by='order_date', ascending=False)

        tanggal_indeks = pd.to_datetime('2015-01-01')
        i = 0
        tanggal_akhir = pd.to_datetime('2015-12-31')
        while tanggal_indeks <= tanggal_akhir:
            tanggal_baru = tanggal_indeks + timedelta(days=5)
            
            # Gunakan .loc[] untuk assignment yang benar
            df.loc[(df['order_date'] >= tanggal_indeks) & 
                        (df['order_date'] < tanggal_baru), 'cluster'] = i
    
            # Update tanggal_indeks dan increment nilai i
            tanggal_indeks = tanggal_baru
            i += 1

        grouped = df.groupby('cluster')
        # Konversi DataFrame ke JSON
        result = {
            "status": "success",
            "data": json.loads(df.to_json(orient='records')),
            "columns": df.columns.tolist(),
            "total_rows": len(df)
        }
        print(json.dumps(result))
        
    except Exception as e:
        print(json.dumps({
            "status": "error",
            "message": str(e)
        }))

if __name__ == "__main__":
    if len(sys.argv) > 1:
        banyakHari = sys.argv[1]
        bagi_csv(banyakHari)