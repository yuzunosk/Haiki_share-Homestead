import React, { Component } from "react";

export default class Card extends Component {
    constructor(props) {
        super(props);
        this.state = {
            name: this.props.name,
            id: this.props.id,
            img: this.props.img
        };
    }
    render() {
        return (
            <div>
                name:{this.state.name} id:{this.state.id}
                <img src={this.state.img} width="170px" />
            </div>
        );
    }
}
