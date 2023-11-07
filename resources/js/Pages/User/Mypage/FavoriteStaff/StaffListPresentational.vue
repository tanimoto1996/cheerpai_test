<template>
    <div class="favorite-staff-section">
        <h2>お気に入りスタッフ</h2>
        <div class="staff-cards">
            <div class="staff-card">
            <img src="/images/kasahiyoko.png" alt="スタッフName" class="staff-image">
            <div class="staff-info">
                <p class="staff-name">スタッフName</p>
                <p class="staff-position">ショップName</p>
            </div>
            </div>
            <div class="staff-card">
            <img src="/images/kasahiyoko.png" alt="スタッフName" class="staff-image">
            <div class="staff-info">
                <p class="staff-name">スタッフName</p>
                <p class="staff-position">ショップName</p>
            </div>
            </div>
            <div class="staff-card">
            <img src="/images/kasahiyoko.png" alt="スタッフName" class="staff-image">
            <div class="staff-info">
                <p class="staff-name">スタッフName</p>
                <p class="staff-position">ショップName</p>
            </div>
            </div>
        </div>
        <button class="view-all-button">お気に入りスタッフ一覧</button>
    </div>
</template>

<style scoped>
/* お気に入りスタッフ */
.favorite-staff-section {
  background-color: #ffffff;
  text-align: center;
  padding: 20px;
  border-radius: 10px; /* 角の丸み */
}

.favorite-staff-section h2 {
  margin-bottom: 20px;
}

.staff-cards {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}

.staff-card {
  width: 30%; /* カードの幅 */
}
.staff-card img {
    background: lightskyblue;
}

.staff-image {
  width: 100%;
  height: auto; /* 画像の高さは自動調整 */
  border-radius: 50%; /* 丸い形状 */
  margin-bottom: 10px;
}

.staff-info {
  background-color: #ffffff; /* カード情報の背景色 */
  padding: 10px;
  border-radius: 5px; /* 角の丸み */
}

.staff-name {
  font-weight: bold;
  font-size: 13px;
}

.staff-position {
  color: #666666;
  font-size: 13px;
}

.view-all-button {
  background-color: #333333; /* ボタンの背景色 */
  color: #ffffff; /* ボタンのテキスト色 */
  border: none;
  padding: 10px 20px;
  border-radius: 5px; /* 角の丸み */
  cursor: pointer; /* ホバー時のカーソル形状 */
}

</style>