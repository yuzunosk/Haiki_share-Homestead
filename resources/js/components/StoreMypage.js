import React, { Component } from "react";
import ReactDOM from "react-dom";
import Card from "./StoreCard";

export default class StoreMypage extends Component {
    constructor(props) {
        super(props);
        this.state = {
            data: [
                {
                    name: "バナナケーキ",
                    id: 1,
                    img: "/storage/img/l571718.jpg"
                },
                {
                    name: "オムライス",
                    id: 1,
                    img: "/storage/img/samneil_20180903_1.jpg"
                },
                {
                    name: "おにぎり",
                    id: 1,
                    img:
                        "/storage/img/large-e8da00f37e926861ea96c1f451862e7f.jpg"
                }
            ]
        };
    }
    render() {
        let cards = [];
        for (let i in this.state.data) {
            cards.push(
                <Card
                    name={this.state.data[i].name}
                    img={this.state.data[i].img}
                    key={i}
                    id={this.state.data[i].id}
                />
            );
        }

        return (
            <div className="container">
                <div>
                    <h1>マイページ</h1>データを流し込む
                    <div>
                        <p>
                            <a href="">出品する</a>
                        </p>
                        <p>
                            <a href="">商品一覧</a>
                        </p>
                        <p>
                            <a href="">プロフィール編集</a>
                        </p>
                    </div>
                </div>
                <div>
                    マイページコンポーネントB
                    <div>
                        最近いいねした商品/<span>全ての商品をみる</span>
                    </div>
                    {cards}
                </div>
                <div>
                    マイページコンポーネントB
                    <div>
                        最近購入した商品/<span>全ての商品をみる</span>
                        <p>画像を数個並べる</p>
                    </div>
                </div>
            </div>
        );
    }
}

ReactDOM.render(
    <StoreMypage></StoreMypage>,
    document.getElementById("store_mypage")
);
