import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
    render() {
        return (
            <div className="container">
                <h1>マイページ</h1>データを流し込む

                <div>プロフィール編集<span>歯車img</span>
                    <div>マイページコンポーネントA
                        <p>登録したユーザー名</p>
                        <p>ゆずのすけ</p>
                    </div>

                    <div>マイページコンポーネントA
                        <p>登録したEmailアドレス</p>
                        <p>yuzunossk.test55@example.com</p>
                    </div>

                    <div>マイページコンポーネントA
                        <p>登録した住所</p>
                        <p>柚子の里農業村2-18-1029</p>
                    </div>

                    <div>マイページコンポーネントB
                        <div>最近いいねした商品/<span>全ての商品をみる</span>
                            <p>
                            画像を数個並べる
                            </p>
                        </div>
                    </div>

                    <div>マイページコンポーネントB
                        <div>最近購入した商品/<span>全ての商品をみる</span>
                            <p>
                            画像を数個並べる
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
