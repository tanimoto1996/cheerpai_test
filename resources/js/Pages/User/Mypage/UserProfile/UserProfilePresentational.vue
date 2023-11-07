<script setup>
    import { defineProps } from 'vue';

    const props = defineProps({
        name: String
    });
</script>

<template>
    <div class="page-title">
        <p>マイページ</p>
    </div>

    <div class="user-name">
        <p>{{ name }}</p>
    </div>

    <div class="profile-section">
        <div class="actions">
            <div class="link-contents">
                <button class="action-button">
                    <span class="icon coupon"></span>
                    <span>ポイント</span><br>
                    <span class="points-value">100,000CP</span>
                </button>
                <button class="action-button">
                    <span class="icon coupon"></span>
                    <span>プロフィール</span>
                </button>
            </div>
            <div class="link-contents">
                <button class="action-button">
                <span class="icon trophy"></span>
                <span>成績履歴</span>
                </button>
                <button class="action-button">
                <span class="icon crown"></span>
                <span>ランキング</span>
                </button>
            </div>
        </div>
        <button class="campaign-button shop">ショップ一覧</button>
        <button class="campaign-button">ポイントキャンペーン</button>
    </div>
</template>

<style scoped>
/* 上部 */
.page-title {
    background: #fff;
    border-bottom: 1px solid #f3f3f3;
    text-align: center;
}
.page-title p {
    padding: 10px;
}
.user-name {
    background: #fff;
    border-bottom: 1px solid #f3f3f3;
    text-align: center;
    box-shadow: 0px 8px 5px -5px rgba(0,0,0,0.1);
}
.user-name p {
    padding: 10px;
}

/* リンク集 */
.link-contents {
    display: flex;
}
.profile-section {
    margin: 10px 0;
    padding: 10px;
    text-align: center;
    border-radius: 10px;
}

.points {
  display: flex; /* フレックスボックス */
  align-items: center; /* アイテムを中央揃え */
  justify-content: center; /* アイテムを中央に */
  margin-bottom: 10px; /* 下の余白 */
}

.points-value {
  margin-left: 5px; /* アイコンとテキストの間隔 */
}

.action-button {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
    margin: 5px;
    width: 100%;
    height: 70px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.campaign-button {
  background-color: #ffcc00; /* キャンペーンボタンの背景色 */
  color: #fff; /* テキストの色 */
  border: none; /* 枠線なし */
  border-radius: 5px; /* 角の丸み */
  padding: 10px; /* 内側の余白 */
  margin-top: 10px; /* 上の余白 */
  width: 100%; /* 幅いっぱい */
}

.campaign-button.shop{
    color: #333333;
    background-color: #fff;
    border: 1px solid #ddd;
}
</style>