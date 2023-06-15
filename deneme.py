import mysql.connector
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity

# MySQL veritabanı bağlantısı
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="rönt"
)

# Kullanıcının ilgi alanını al
user_id = None  # Örnek olarak kullanıcı kimliği 1 olarak varsayalım
if "user_id" in globals():
    user_id = globals()["user_id"]
if user_id is not None:
    cursor = db.cursor()
    cursor.execute("SELECT kategoriId FROM users WHERE id = %s", (user_id,))
    result = cursor.fetchone()

if result is not None:
    user_interests = result[0]

    # Kullanıcının ilgi alanının kategorisini al
    cursor.execute("SELECT kategoriId FROM users WHERE kategoriId = %s", (user_interests,))
    result = cursor.fetchone()

    if result is not None:
        user_category = result[0]

        # Kategorisi kullanıcının ilgi alanıyla uyumlu olan ürünleri al
        cursor.execute("SELECT urunAd, kategoriId FROM tesistable WHERE kategoriId = %s", (user_category,))
        matching_results = cursor.fetchall()

        # Diğer ürünleri al
        cursor.execute("SELECT urunAd, kategoriId FROM tesistable WHERE kategoriId != %s", (user_category,))
        other_results = cursor.fetchall()

        # Ürün adlarını ve kategorileri ayır
        matching_product_names = [row[0] for row in matching_results]
        matching_categories = [row[1] for row in matching_results]
        other_product_names = [row[0] for row in other_results]
        other_categories = [row[1] for row in other_results]

        # TfidfVectorizer ile ürün adlarını vektörize et
        vectorizer = TfidfVectorizer()
        matching_product_vectors = vectorizer.fit_transform(matching_product_names)
        other_product_vectors = vectorizer.transform(other_product_names)

        # Kullanıcının ilgi alanını da vektörize et
        user_vector = vectorizer.transform([user_interests])

        # Ürünler ve kullanıcının ilgi alanı arasındaki benzerlikleri hesapla
        matching_similarities = cosine_similarity(user_vector, matching_product_vectors).flatten()
        other_similarities = cosine_similarity(user_vector, other_product_vectors).flatten()

        # Benzerlik skorlarına göre ürünleri sırala
        matching_sorted_indices = matching_similarities.argsort()[::-1]  # En yüksek benzerlik skorlarına göre ters sırala
        other_sorted_indices = other_similarities.argsort()[::-1]  # En yüksek benzerlik skorlarına göre ters sırala

        # Sonuçları ekrana yazdır
        print("Kullanıcının ilgi alanına benzer ürünler:")
        for i in matching_sorted_indices:
            product_name = matching_product_names[i]
            category = matching_categories[i]
            print(f"Ürün Adı: {product_name}, Kategori: {category}")

        print("\nDiğer ürünler:")
        for i in other_sorted_indices:
            product_name = other_product_names[i]
            category = other_categories[i]
            print(f"Ürün Adı: {product_name}, Kategori: {category}")

    else:
        print("Kullanıcının ilgi alanı için kategori bulunamadı.")

else:
    print("Kullanıcı bulunamadı.")

# Veritabanı bağlantısını kapat
cursor.close()
db.close()