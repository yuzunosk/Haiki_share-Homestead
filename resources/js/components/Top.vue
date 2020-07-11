<template>
    <div class="l_top__container">
        <div class="l_top--hero">
            <img
                class="c_hero__main__container"
                src="/storage/img/large-e8da00f37e926861ea96c1f451862e7f.jpg"
                alt="Topメイン画像"
            />
            <img
                class="c_hero__main__logo"
                src="/storage/img/HaikiYasan_Logo.png"
                alt="ロゴ"
            />
        </div>

        <!-- 後にvue.jsで作る -->
        <div class="l_top--info">
            <InfoTopCardUnit></InfoTopCardUnit>

            <a class="l_top--info--link u_display--center" :href="index_link">
                <i class="fas fa-caret-right fa-2x mr-20"></i>
                全てのメニューから探す
            </a>
        </div>

        <div class="l_top--about">
            <div class="l_top--about--text">
                <h3 class="u_font__lage--text mb-30">
                    毎日の元気になる、コンビニごはん
                </h3>
                <p class="u_font__default">
                    朝食を食べないと「なんだか頭がぼんやりする」なんてことはありませんか？それは私たちを元気にしてくれるエネルギー源が不足しているからです。朝食は1日を元気に過ごすための大事なスイッチです。しっかり食べて毎日を元気に過ごしましょう！
                </p>
            </div>
            <div class="l_top--about--primary">
                <img
                    class="l_top--about--primary--imageA"
                    src="/storage/img/hanba-gu.jpg"
                    alt="imageA"
                />
                <img
                    class="l_top--about--primary--imageB"
                    src="/storage/img/samneil_20180903_1.jpg"
                    alt="imageB"
                />
                <div class="l_top--about--primary--line"></div>
            </div>
            <div class="l_top--about--secondary">
                <img
                    class="l_top--about--secondary--image"
                    src="/storage/img/resized.jpg"
                    alt="imageC"
                />
            </div>
        </div>
        <div class="l_top--process">
            <div class="l_top--process--head">
                <div class="l_top--process--title u_display--center--column">
                    <h2 class="u_font__Xlage--text">ご利用手順</h2>
                    <p class="l_top--process--title--subtitleA u_font__default">
                        左から順におすすみください
                    </p>
                    <p class="l_top--process--title--subtitleB u_font__default">
                        上から順におすすみください
                    </p>
                </div>
            </div>
            <div class="l_top--process--main">
                <NavgateCard></NavgateCard>
            </div>
            <div class="l_top--process--btn">
                <a :href="login_link" class="btn--lage btn--white">登録する</a>
            </div>
        </div>
    </div>
</template>

<script>
import InfoTopCardUnit from "./InfoTopCardUnit";
import NavgateCard from "./NavgateCard";
export default {
    data() {
        return {};
    },
    computed: {
        index_link() {
            return "/index";
        },
        login_link() {
            return "/regist";
        }
    },
    components: {
        InfoTopCardUnit,
        NavgateCard
    }
};
</script>
