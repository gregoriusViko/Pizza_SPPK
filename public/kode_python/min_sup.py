# read_csv.py
import pandas as pd
import json
import sys
from mlxtend.frequent_patterns import apriori

def cari_support(min_sup):
    try:
        df_pivot = pd.read_csv('kode_python/tabel_tabular.csv')
        # Menggunakan algoritma Apriori untuk menemukan itemset yang sering muncul
        df_pivot.drop('cluster', axis=1, inplace=True)
        frequent_itemsets = apriori(df_pivot, min_support=min_sup/100, use_colnames=True)

        # Mengonversi frozenset menjadi string yang lebih bersih
        frequent_itemsets['itemsets'] = frequent_itemsets['itemsets'].apply(lambda x: ', '.join(list(x)))
        frequent_itemsets.to_csv('kode_python/support_value.csv', index=False)
        
    except Exception as e:
        print(json.dumps({
            "status": "error",
            "message": str(e)
        }))

if __name__ == "__main__":
    if len(sys.argv) > 1:
        min_sup = float(sys.argv[1])
        cari_support(min_sup)